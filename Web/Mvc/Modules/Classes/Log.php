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

    use \Orion\v1\Web\Mvc\Modules\Interfaces\Log as ILog;
    use \Orion\v1\Web\Mvc\Modules\Classes\Config;
    
    final class Log implements ILog {

        private $Config;

        private $_file_extension = "txt";

        private $_file_permissions = 0644;

        private $_log_path = "LOGS";

        private $_log_enabled = FALSE;

        private $_log_threshold = 1;

        private $_log_date_format = "Y-m-d H:i:s";

        private $_log_levels = array(
            "ERROR" => 1,
            "DEBUG" => 2,
            "INFO" => 3,
            "ALL" => 4
        );

        public function __construct(Config $Config) {
            $this->Config = $Config;
            $this->_log_path = BASE_PATH . "/" . $this->Config->{"app_directory"} . "/" . $this->Config->{"log_directory"};
            if(!is_dir($this->_log_path)) {
                exit("Error: LOG path specified does not exist.");
            }
            $this->_log_enabled = $this->Config->{"log_enabled"};
            $this->_log_threshold = $this->Config->{"log_threshold"};
            $this->_log_date_format = (isset($this->Config->{"log_date_format"}) and is_string($this->Config->{"log_date_format"})) ? $this->Config->{"log_date_format"} : "Y-m-d H:i:s";
        }
        
        public function __destruct() {}

        public function write_event($level, $msg, $exception = FALSE) {
            if (FALSE === $this->_log_enabled) {
                return FALSE;
            }

            $level = mb_strtoupper($level);
            if ((!isset($this->_log_levels[$level]) or ($this->_log_levels[$level] > $this->_log_threshold))) {
                return FALSE;
            }

            $filepath = $this->_log_path . "/log-" . date("Y-m-d") . "." . $this->_file_extension;
            $message = '';
            
            if (!file_exists($filepath)) {
                $newfile = TRUE;

                if("php" === $this->_file_extension) {
                    $message .= '<?php exit("Direct access to this file is not allowed."); ?>\n\n';
                }
            }

            if (!$fp = @fopen($filepath, 'ab')) {
                return FALSE;
            }

            // Instantiating DateTime with microseconds appended to initial date is needed for proper support of this format
            if (FALSE !== strpos($this->_log_date_format, 'u')) {
                $microtime_full = microtime(TRUE);
                $microtime_short = sprintf("%06d", ($microtime_full - floor($microtime_full)) * 1000000);
                $date = new DateTime(date('Y-m-d H:i:s.'.$microtime_short, $microtime_full));
                $date = $date->format($this->_date_fmt);
            } else {
                $date = date($this->_log_date_format);
            }

            $message .= $level . " - " . $date . " --> " . $msg . "\n";

            if($exception instanceof \Exception) {
                $message .= "\n" . mb_strtoupper($_SERVER['REQUEST_METHOD']) . " - " . $_SERVER['REQUEST_URI'];
                $message .= "\n" . $exception->getFile() . ": " . $exception->getLine() . "\n\n";
                $message .= $exception->getTraceAsString() . "\n\n";
            }

            flock($fp, LOCK_EX);

            for($written = 0, $length = strlen($message); $written < $length; $written += $result) {
                if(FALSE === ($result = fwrite($fp, substr($message, $written)))) {
                    echo "here now?";
                    break;
                }
            }

            flock($fp, LOCK_UN);
            fclose($fp);

            if(isset($newfile) and (TRUE === $newfile)) {
                chmod($filepath, $this->_file_permissions);
            }

            return TRUE;
        }
    
    }

}