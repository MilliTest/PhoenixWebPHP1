<?php
/*
 *  Orion - PHP Framework
 *  Base Service Trait
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace Orion\v1\Web\Mvc\Exceptions\Api {
    
    final class EndpointNotFoundException extends \Exception {
    
        public function __construct() {
            parent::__construct("There was no response from the specified endpoint. The service may be down or the specified path may be incorrect.", 404);
        }

        public function __destruct() {}

    }

}