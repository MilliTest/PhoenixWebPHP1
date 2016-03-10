<?php
/*
 *  Orion - PHP Framework
 *  Base View Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace Orion\v1\Web\Mvc\Core\Classes {

    use \Orion\v1\Web\Mvc\Core\Interfaces\BaseView as IBaseView;
    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    use \Orion\v1\Web\Mvc\Modules\Classes\Log;
    
    abstract class BaseView implements IBaseView {

        private $Config;
        
        private $Log;

        public function __construct(Config $Config, Log $Log) {
            $this->Config = $Config;
            $this->Log = $Log;
        }
        
        public function __destruct() {}
    
    }

}