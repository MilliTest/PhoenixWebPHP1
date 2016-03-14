<?php
/*
 *  FCD Apps APIs - PHP Framework
 *  Home Controller Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace PhoenixWeb\ViewModels\Home {

    use \Orion\v1\Web\Mvc\Core\Classes\BaseViewModel;
    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    use \Orion\v1\Web\Mvc\Modules\Classes\Log;
    
    class IndexViewModel extends BaseViewModel {

        public function __construct(Config $Config, Log $Log) {
            parent::__construct($Config, $Log);
            echo __DIR__;
        }
        
        public function __destruct() {
            parent::__destruct();
        }

        public function render() {
            echo "Ready.";
        }
    
    }

}