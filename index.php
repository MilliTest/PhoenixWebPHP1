<?php
use \Orion\v1\Web\Mvc\Modules\Classes;
use \PhoenixWeb\Generic;

ob_start();

/* Load site configuation file... */
require_once("config.php");

/* Maintenance Mode */
if(TRUE === $config['maintenance_mode']) {
    header("HTTP/1.0 503 Server Unavailable");
    exit("503 - Server Unavailable. Offline for Maintenance.");
}


define(BASE_PATH, $config['base_path']);
require_once(BASE_PATH . "\\Orion\\v1\\Web\\Bootstrap\\init.php");
require_once(BASE_PATH . "\\Razr\\autoloader.php");

try {

    // Initialize Router
    $ROUTER = new Classes\Router($CONFIG, $LOG);

    // Invoke Router
    $ROUTER->match_route();

    $ctrl = "\\" . $CONFIG->{"app_directory"} . "\\Controllers\\" . $ROUTER->get_controller() . "Controller";

    $CONTROLLER = new $ctrl($CONFIG, $LOG);

    $BENCHMARK->set("end");

    if(TRUE === $ROUTER->is_webservice()) {

        switch($CONFIG->{"api_response_type"}) {
            case "auto":
                $extension = mb_strtolower(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], ".") + 1));
                switch ($extension) {
                    case "xml":
                        header('Content-Type: text/xml');
                        
                        break;
                    case "json":
                        header('Content-Type: application/json');
                        break;
                    default:
                    // TODO: Implement type not supported exception.
                }
                break;
            case "xml":
                header('Content-Type: text/xml');
                
                break;
            case "json":
                header('Content-Type: application/json');
                break;
            default:
            // TODO: Implement type not supported exception.
        }

        $Response = new Generic\ApiResponse();
        $Response->message = "";
        $Response->code = 200;
        $Response->success = TRUE;
        $Response->status = "active";
        $Response->description = "healthy";

        $benchmark_results = $BENCHMARK->output_benchmark_suite_as_array();
        if(FALSE !== $benchmark_results) {
            $Response->markers = $benchmark_results;
        }

        switch($CONFIG->{"api_response_type"}) {
            case "auto":
                $extension = mb_strtolower(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], ".") + 1));
                switch ($extension) {
                    case "xml":
                        $XML = new Classes\XmlSerializer();
                        echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response", "marker");
                        break;
                    case "json":
                        echo json_encode($Response);
                        break;
                }
                break;
            case "xml":
                $XML = new Classes\XmlSerializer();
                echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response", "marker");
                break;
            case "json":
                echo json_encode($Response);
                break;
        }
    } else {
        $CONTROLLER->{"Action" . $ROUTER->get_action()}();
        $BENCHMARK->output_benchmark_suite_as_html();
    }

    exit;
} catch (\Exception $e) {
    ob_clean();

    $classname = get_class($e);
    $LOG->write_event("ERROR", substr($classname, strrpos($classname, "\\") + 1) . ": " . $e->getCode() . " - " . $e->getMessage(), $e);

    if(TRUE === $ROUTER->is_webservice()) {

        $Response = new \FcdAppsApis\Generic\ApiResponse();
        $Response->message = $e->getMessage();
        $Response->code = $e->getCode();
        $Response->success = FALSE;
        $Response->status = "active";
        $Response->description = "healthy";

        switch($CONFIG->{"api_response_type"}) {
            case "auto":
                $extension = mb_strtolower(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], ".") + 1));
                switch ($extension) {
                    case "xml":
                        $XML = new Classes\XmlSerializer();
                        echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response");
                        break;
                    case "json":
                        echo json_encode($Response);
                        break;
                }
                break;
            case "xml":
                $XML = new Classes\XmlSerializer();
                echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response");
                break;
            case "json":
                echo json_encode($Response);
                break;
        }
    } else {
        //echo "A fatal error occurred and the script was terminated. See error log for more details.";
        echo $e->getMessage() . "<br />" . $e->getTraceAsString();
    }
    exit;
}
ob_end_flush();