<?php
/*
 *  Orion - PHP Framework
 *  Config Module Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 5 January 2016
 */

namespace Orion\v1\Web\Mvc\Modules\Classes {

    use \Orion\v1\Web\Mvc\Modules\Interfaces\Config as IConfig;
    
    final class Config implements IConfig {

        private $_config = array();

        public function __construct(array $config) {
            $this->_config = $config;
        }
        
        public function __destruct() {}

        public function __set($name, $value) {
            $this->_config[$name] = $value;
        }

        public function __get($name) {
            return (isset($this->_config[$name]) and !empty($this->_config[$name])) ? $this->_config[$name] : FALSE;
        }
    
    }

}