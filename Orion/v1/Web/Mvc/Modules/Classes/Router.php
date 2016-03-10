<?php
/*
 *  Orion - PHP Framework
 *  Router Module Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 5 January 2016
 */

namespace Orion\v1\Web\Mvc\Modules\Classes {

    use \Orion\v1\Web\Mvc\Modules\Interfaces\Router as IRouter;
    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    use \Orion\v1\Web\Mvc\Modules\Classes\Log;
    
    final class Router implements IRouter {

        private $Config;

        private $Log;

        private $_routes = array();

        private $_matches = array();

        public function __construct(Config $Config, Log $Log) {
            $this->Config = $Config;
            $this->Log = $Log;
            $this->load_routes();
            $this->Log->write_event("INFO", "Module Router has been initialized.");
        }
        
        public function __destruct() {}

        private function load_routes() {
            if(!file_exists("routes.php")) {
                exit("Error: No \"routes.php\" found.");
            }
            require_once("routes.php");
            foreach($routes as $route => $options) {
                $this->_routes[$this->normalize_uri($route)] = $options;
            }
        }

        /* Helper Methods */
        private function normalize_uri($uri) {
            // Remove query string if any
            if(FALSE !== strpos($uri, "?")) {
                echo $uri = substr($uri, 0, strpos($uri, "?"));
            }

            // Trim leading and trailing slashes
            $uri = trim($uri, "/");

            // Escape slashes for RegEx
            $uri = mb_str_replace("/", "\/", $uri);

            // Escape actual dots
            $uri = mb_str_replace(".", "\\.", $uri);

            // Swap (:num) expression
            $uri = mb_str_replace("(:num)", "[0-9]+", $uri);

            // Swap (:alpha) expression
            $uri = mb_str_replace("(:alpha)", "[A-Za-z]+", $uri);

            $uri = "/^" . $uri . "$/";

            return $uri;
        }

        public function match_route() {
            $this->_matches['method'] = mb_strtolower($_SERVER['REQUEST_METHOD']);

            $uri = trim($_SERVER['REQUEST_URI'], "/");
            if(FALSE !== strpos($uri, "?")) {
                $uri = substr($uri, 0, strpos($uri, "?"));
            }
            
            foreach($this->_routes as $route => $options) {
                if(preg_match($route, $uri)) {
                    $this->_matches['controller'] = $options['controller'];
                    $this->_matches['action'] = $options['action'];
                    break;
                }
            }

            if(!isset($this->_matches['controller']) or !isset($this->_matches['action'])) {
                if(TRUE === $this->Config->is_api) {
                    throw new \Orion\v1\Web\Mvc\Exceptions\Api\EndpointNotFoundException();
                } else {
                    exit("TODO: Implement route exception.");
                }
            }
        }

        public function get_controller() {
            return (isset($this->_matches['controller']) and !empty($this->_matches['controller']) and is_string($this->_matches['controller'])) 
                ? $this->_matches['controller'] 
                : FALSE;
        }

        public function get_action() {
            return (isset($this->_matches['action']) and !empty($this->_matches['action']) and is_string($this->_matches['action'])) 
                ? $this->_matches['action'] 
                : FALSE;
        }

        public function is_webservice() {
            return (isset($this->_matches['webservice'])) ? $this->_matches['webservice'] : FALSE;
        }
    
    }

}