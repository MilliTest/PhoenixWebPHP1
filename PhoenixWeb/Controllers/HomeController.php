<?php
/*
 *  FCD Apps APIs - PHP Framework
 *  Home Controller Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace PhoenixWeb\Controllers {

    use \Orion\v1\Web\Mvc\Core\Classes\BaseController;
    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    use \Orion\v1\Web\Mvc\Modules\Classes\Log;
    use \PhoenixWeb\Interfaces\Controllers\HomeController as IHomeController;
    
    class HomeController extends BaseController implements IHomeController {

        private $Model;

        private $ViewModel;

        public function __construct(Config $Config, Log $Log) {
            parent::__construct($Config, $Log);
        }
        
        public function __destruct() {
            parent::__destruct();
        }

        public function ActionIndex() {
            $this->ViewModel = new \PhoenixWeb\ViewModels\Home\IndexViewModel(
                    $this->Config,
                    $this->Log
                );
            $this->ViewModel->render();
        }

        public function ActionContact() {
            $this->ViewModel = new \PhoenixWeb\ViewModels\Home\ContactViewModel(
                    $this->Config,
                    $this->Log
                );
            $this->ViewModel->render();
        }
    }

}