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
    
    class IndexViewModel extends BaseViewModel {

        private $razr;

        public function __construct(Config $Config, Log $Log) {
            parent::__construct($Config, $Log);
            $this->razr = new \Razr\Engine(new \Razr\Loader\FilesystemLoader(__DIR__ . "\\..\\..\\Views"));
        }
        
        public function __destruct() {
            parent::__destruct();
        }

        public function render() {
            $ViewData['title'] = "Shop | Peak Outdoor Adventure";
            $ViewData['copyright'] = date("Y");
            $ViewData['stylesheets'] = [
                "index",
                "shop"
            ];
            $ViewData['products'] = json_decode(file_get_contents(__DIR__ . "\\..\\..\\Data\\products.json"));
            foreach($ViewData['products'] as $product) {
                $ViewData['categories'][] = $product->category;
            }
            $ViewData['categories'] = array_unique($ViewData['categories']);
            foreach($ViewData['products'] as $product) {
                $ViewData['collection'][] = $product->category;
            }
            $ViewData['collection'] = array_unique($ViewData['collection']);
            echo $this->razr->render('Templates\\Shop\\index.razr.php', $ViewData);
        }
    
    }

}