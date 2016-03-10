<?php
/*
 *  Orion - PHP Framework
 *  Config Module Interface
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 5 January 2016
 */

namespace Orion\v1\Web\Mvc\Modules\Interfaces {
    
    interface Config {

        public function __construct(array $config);
        public function __destruct();
        public function __set($name, $value);
        public function __get($name);
    
    }

}