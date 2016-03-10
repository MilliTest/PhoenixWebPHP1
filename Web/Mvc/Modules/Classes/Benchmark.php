<?php
/*
 *  Orion - PHP Framework
 *  Config Module Class
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 5 January 2016
 */

namespace Orion\v1\Web\Mvc\Modules\Classes {

    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    use \Orion\v1\Web\Mvc\Modules\Classes\Log;
    
    final class Benchmark {

        private $Config;

        private $Log;

        private $_markers = array();

        private $_benchmark_enabled = FALSE;

        private $_benchmark_decimals = 4;

        public function __construct(Config $Config, Log $Log) {
            $this->Config = $Config;
            $this->Log = $Log;
            $this->_benchmark_enabled = $this->Config->{"benchmark_enabled"};
            $this->_benchmark_decimals = $this->Config->{"benchmark_decimals"};
        }

        public function __destruct() {}

        public function set($name = "") {
            if(!$this->_benchmark_enabled) {
                return FALSE;
            }

            if(empty($name) or !is_string($name)) {
                return FALSE;
            }
            $this->_markers[$name] = microtime(TRUE);
            $this->Log->write_event("DEBUG", "Benchmark marker - \"" . $name . "\" - has been set.");
            return TRUE;
        }

        public function discard_marker($name) {
            if(!$this->_benchmark_enabled) {
                return FALSE;
            }

            if(empty($name) or !is_string($name)) {
                return FALSE;
            }
            unset($this->_markers[$name]);
            return TRUE;
        }

        private function elapsed_time($point_1 = "", $point_2 = "", $decimals = FALSE) {
            if ((!isset($point_1) or empty($point_1) or !is_string($point_1)) or (!isset($point_2) or empty($point_2) or !is_string($point_2))) {
                return FALSE;
            }

            if(!is_integer($decimals)) {
                $decimals = $this->_benchmark_decimals;
            }

            return number_format($this->_markers[$point_2] - $this->_markers[$point_1], $decimals);
        }

        public function output_benchmark_suite_as_html() {
            if(!$this->_benchmark_enabled) {
                return FALSE;
            }

            $output_buffer = ob_get_contents();
            ob_clean();
            $benchmark_html = "";
            $benchmark_html .= "<table style=\"width: 600px; border: 2px solid #000;\" borders=\"1\"><thead><tr><th>Marker Name</th><th>Marker Time</th><th>Elasped Time</th></tr></thead><tbody>";
            $rows_html = array();
            foreach($this->_markers as $key => $value) {
                $row_html = "";
                $row_html = "<tr><td>" . $key . "</td><td>" . $value . "</td>";
                if(0 === count($rows_html)) {
                    $row_html .= "<td>---</td></tr>";
                } else {
                    $point_1 = key($this->_markers);
                    $point_2 = $key;
                    $row_html .= "<td>" . $this->elapsed_time($point_1, $point_2) . " seconds</td></tr>";
                }
                $rows_html[] = $row_html;
            }
            $benchmark_html .= implode("", $rows_html);
            $benchmark_html .= "</tbody></table><br /><br />";
            echo $benchmark_html;
            echo $output_buffer;
        }

        public function output_benchmark_suite_as_array() {
            if(!$this->_benchmark_enabled) {
                return FALSE;
            }

            $markers = array();
            foreach($this->_markers as $key => $value) {
                $temp = array("name" => $key, "time" => $value);
                if(0 === count($markers)) {
                    $temp['elapsed_time'] = "---";
                } else {
                    $point_1 = key($this->_markers);
                    $point_2 = $key;
                    $temp['elasped_time'] = $this->elapsed_time($point_1, $point_2) . " seconds";
                }

                $markers[] = $temp;
            }

            return $markers;
        }
    }

}