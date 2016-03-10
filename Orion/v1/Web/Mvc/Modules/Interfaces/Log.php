<?php
/*
 *  Orion - PHP Framework
 *  Log Module Interface
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace Orion\v1\Web\Mvc\Modules\Interfaces {

    interface Log {

        public function __construct(\Orion\v1\Web\Mvc\Modules\Classes\Config $Config);
        public function __destruct();

    }

}