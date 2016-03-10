<?php
/*
 *  Orion - PHP Framework
 *  Base Service Trait
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */

namespace Orion\v1\Web\Mvc\Modules\Classes {
    
    /*
     * @author: Phil Freo < http://stackoverflow.com/users/137067/philfreo >
     * @url: http://stackoverflow.com/questions/137021/php-object-as-xml-document#answer-2194774
     */
    final class XmlSerializer {

        // functions adopted from http://www.sean-barton.co.uk/2009/03/turning-an-array-or-object-into-xml-using-php/

        public static function generateValidXmlFromObj(stdClass $obj, $node_block='nodes', $node_name='node') {
            $arr = get_object_vars($obj);
            return self::generateValidXmlFromArray($arr, $node_block, $node_name);
        }

        public static function generateValidXmlFromArray($array, $node_block='nodes', $node_name='node') {
            $xml = '<?xml version="1.0" encoding="UTF-8" ?>';

            $xml .= '<' . $node_block . '>';
            $xml .= self::generateXmlFromArray($array, $node_name);
            $xml .= '</' . $node_block . '>';

            return $xml;
        }

        private static function generateXmlFromArray($array, $node_name) {
            $xml = '';

            if (is_array($array) || is_object($array)) {
                foreach ($array as $key=>$value) {
                    if (is_numeric($key)) {
                        $key = $node_name;
                    }

                    $xml .= '<' . $key . '>' . self::generateXmlFromArray($value, $node_name) . '</' . $key . '>';
                }
            } else {
                $xml = htmlspecialchars($array, ENT_QUOTES);
            }

            return $xml;
        }

    }

}