<?php
/*
 *  Orion - PHP Framework
 *  Base Controller Interface
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace Orion\v1\Web\Mvc\Core\Interfaces {
    
    interface BaseController {

        public function __construct(
            \Orion\v1\Web\Mvc\Modules\Classes\Config $Config, 
            \Orion\v1\Web\Mvc\Modules\Classes\Log $Log);
        public function __destruct();
    
    }

}