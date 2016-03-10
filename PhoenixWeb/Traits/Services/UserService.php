<?php
/*
 *  FCD Apps APIs - PHP Framework
 *  Home Controller Interface
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace PhoenixWeb\Interfaces\Controllers {
    
    interface HomeController {

        public function __construct(
            \Orion\v1\Web\Mvc\Modules\Classes\Config $Config, 
            \Orion\v1\Web\Mvc\Modules\Classes\Log $Log, 
            \Orion\v1\Web\Mvc\Modules\Classes\Request $Request,
            \Orion\v1\Web\Mvc\Modules\Classes\Router $Router);
        
        public function __destruct();

        public function ActionIndex();
    
    }

}