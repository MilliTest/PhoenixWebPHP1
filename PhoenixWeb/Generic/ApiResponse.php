<?php
/*
 *  FCD Apps APIs - PHP Framework
 *  Home Controller Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace FcdAppsApis\Generic {
    
    final class ApiResponse {

        public function __construct() {}
        
        public function __destruct() {}

        public function __get($name) {
            return (isset($this->{$name}) and !empty($this->{$name}))
                ? $this->{$name}
                : FALSE;
        }

        public function __set($name, $value) {
            $this->{$name} = $value;
        }

        public function get_response_as_array() {
            return get_object_vars($this);
        }
    
    }

}