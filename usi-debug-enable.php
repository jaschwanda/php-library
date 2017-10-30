<?php // ------------------------------------------------------------------------------------------------------------------------ //

class USI_Debug {

   const VERSION = '1.0.0 (2017-10-30)';

   private static $message = null;

   private function __construct() {
   } // __construct();
   
   private static function escape($message) {
      return(str_replace(array('<!--', '-->'), array('<!==', '==>'), $message));
   } // escape();
   
   public static function exception($e) {
      self::$message .= '<!--' . PHP_EOL . $e->GetMessage() . PHP_EOL . $e->GetTraceAsString() . PHP_EOL . '-->' . PHP_EOL;
   } // exception();

   public static function get_message() {
      $message_save = self::$message;
      self::$message = null;
      return($message_save);
   } // get_message();
   
   public static function message($message) {
      self::$message .= '<!-- ' . self::escape($message) . ' -->' . PHP_EOL;
   } // message();

   public static function output($message = null) {
      if ($message) self::$message .= '<!-- ' . self::escape($message) . ' -->' . PHP_EOL;
      echo self::$message;
      self::$message = null;
   } // output();
   
   public static function print_r($prefix, $array, $suffix = '') {
      self::$message .= '<!-- ' . self::escape($prefix . print_r($array, true) . $suffix) . ' -->' . PHP_EOL;
   } // print_r();
   
} // Class USI_Debug;

// --------------------------------------------------------------------------------------------------------------------------- // ?>