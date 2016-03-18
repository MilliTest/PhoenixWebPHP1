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
    
    class WebApiController extends BaseController implements IHomeController {

        private $Model;

        private $ViewModel;

        public function __construct(Config $Config, Log $Log) {
            parent::__construct($Config, $Log);
        }
        
        public function __destruct() {
            parent::__destruct();
        }

        public function ActionAdd() {
            if(isset($_SESSION['cart'])) {
                $cart = unserialize($_SESSION['cart']);
            } else {
                $cart = [];
            }
            $item = [
                "id"  => intval(strip_tags($_POST['id'])),
                "qty" => intval(strip_tags($_POST['qty']))
            ];
            $cart[] = $item;
            $_SESSION['cart'] = serialize($cart);
            echo json_encode([
                "status"  => true,
                "message" => "Item added to cart."
            ]);
        }
    }

}