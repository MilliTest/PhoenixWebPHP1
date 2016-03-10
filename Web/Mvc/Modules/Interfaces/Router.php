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

    interface Router {

        public function __construct(
            \Orion\v1\Web\Mvc\Modules\Classes\Config $Config,
            \Orion\v1\Web\Mvc\Modules\Classes\Log $Log);
        public function __destruct();
        public function match_route();
        public function get_controller();
        public function get_action();

    }

}