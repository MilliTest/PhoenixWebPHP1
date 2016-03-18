<?php
/*
 *  FCD Apps APIs - PHP Framework
 *  Home Controller Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace PhoenixWeb\ViewModels\Shop {

    use \Orion\v1\Web\Mvc\Core\Classes\BaseViewModel;
    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    use \Orion\v1\Web\Mvc\Modules\Classes\Log;
    
    class CartViewModel extends BaseViewModel {

        private $razr;

        public function __construct(Config $Config, Log $Log) {
            parent::__construct($Config, $Log);
            $this->razr = new \Razr\Engine(new \Razr\Loader\FilesystemLoader(__DIR__ . "\\..\\..\\Views"));
        }
        
        public function __destruct() {
            parent::__destruct();
        }

        public function render() {
            $ViewData['title'] = "Cart | Peak Outdoor Adventure";
            $ViewData['copyright'] = date("Y");
            $ViewData['stylesheets'] = [
                "cart"
            ];
            $ViewData['javascript'] = [
                "jquery",
                "details"
            ];
            $products = json_decode(file_get_contents(__DIR__ . "\\..\\..\\Data\\products.json"));
            $ViewData['cart'] = (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) ? unserialize($_SESSION['cart']) : [];
            foreach($ViewData['cart'] as &$item) {
                foreach($products as $product) {
                    if($item['id'] === $product->id) {
                        $item['name'] = $product->name;
                        $item['thumbnail'] = $product->thumbnail;
                        $item['price'] = $product->price;
                    }
                }
            }
            echo $this->razr->render('Templates\\Shop\\cart.razr.php', $ViewData);
        }
    
    }

}