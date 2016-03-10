<?php
/*
 *  Orion - PHP Framework
 *  Base Controller Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace Orion\v1\Web\Mvc\Core\Classes {

    use \Orion\v1\Web\Mvc\Core\Interfaces\BaseController as IBaseController;
    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    use \Orion\v1\Web\Mvc\Modules\Classes\Log;
    
    abstract class BaseController implements IBaseController {

        private $Config;
        
        private $Log;

        public function __construct(Config $Config, Log $Log) {
            $this->Config = $Config;
            $this->Log = $Log;
        }
        
        public function __destruct() {}
    
    }

}