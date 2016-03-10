<?php
/*
 *  Orion - PHP Framework
 *  Base Service Trait
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace Orion\v1\Web\Mvc\Core\Traits {
    
    trait BaseService {
    
        public function new_service_client(array $config) {
            if(!is_array($config)) {
                return FALSE;
            }

            $pdo = new \PDO($config['dsn'], $config['username'], $config['password']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

    }

}