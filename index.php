<?php
use \Orion\v1\Web\Mvc\Modules\Classes;
use \FcdAppsApis\Generic;

//ob_start();

/* Load site configuation file... */
require_once("config.php");
echo __DIR__;
echo is_dir(__DIR__ . "Orion\\v1\\Web\\Bootstrap");
//include_once("./Orion/v1/Web/Bootstrap/init.php");

echo "Done!";
//try {

//    // Initialize Router
//    $ROUTER = new Classes\Router($CONFIG, $LOG);

//    // Invoke Router
//    $ROUTER->match_route();

//    $ctrl = "\\FcdAppsApis\\Controllers\\" . $ROUTER->get_controller() . "Controller";

//    $CONTROLLER = new $ctrl($CONFIG, $LOG);

//    $BENCHMARK->set("end");

//    //echo Test\Core::factory();

//    if(TRUE === $CONFIG->{"is_api"}) {
//        $Response = new Generic\ApiResponse();
//        $Response->message = "";
//        $Response->code = 200;
//        $Response->success = TRUE;
//        $Response->status = "active";
//        $Response->description = "healthy";

//        $benchmark_results = $BENCHMARK->output_benchmark_suite_as_array();
//        if(FALSE !== $benchmark_results) {
//            $Response->markers = $benchmark_results;
//        }

//        switch($CONFIG->{"api_response_type"}) {
//            case "auto":
//                $extension = mb_strtolower(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], ".") + 1));
//                switch ($extension) {
//                    case "xml":
//                        $XML = new Classes\XmlSerializer();
//                        echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response", "marker");
//                        break;
//                    case "json":
//                        echo json_encode($Response);
//                        break;
//                }
//                break;
//            case "xml":
//                $XML = new Classes\XmlSerializer();
//                echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response", "marker");
//                break;
//            case "json":
//                echo json_encode($Response);
//                break;
//        }
//    } else {
//        echo "<pre>";
//        print_r($CONTROLLER);
//        echo "</pre>";

//        $BENCHMARK->output_benchmark_suite_as_html();
//    }

//    exit;
//} catch (\Exception $e) {
//    ob_clean();

//    $classname = get_class($e);
//    $LOG->write_event("ERROR", substr($classname, strrpos($classname, "\\") + 1) . ": " . $e->getCode() . " - " . $e->getMessage(), $e);

//    if(TRUE === $CONFIG->{"is_api"}) {

//        $Response = new \FcdAppsApis\Generic\ApiResponse();
//        $Response->message = $e->getMessage();
//        $Response->code = $e->getCode();
//        $Response->success = FALSE;
//        $Response->status = "active";
//        $Response->description = "healthy";

//        switch($CONFIG->{"api_response_type"}) {
//            case "auto":
//                $extension = mb_strtolower(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], ".") + 1));
//                switch ($extension) {
//                    case "xml":
//                        $XML = new Classes\XmlSerializer();
//                        echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response");
//                        break;
//                    case "json":
//                        echo json_encode($Response);
//                        break;
//                }
//                break;
//            case "xml":
//                $XML = new Classes\XmlSerializer();
//                echo $XML::generateValidXmlFromArray($Response->get_response_as_array(), "response");
//                break;
//            case "json":
//                echo json_encode($Response);
//                break;
//        }
//    } else {
//        echo "A fatal error occurred and the script was terminated. See error log for more details.";
//    }
//    exit;
//}
//ob_end_flush();