<?php // ------------------------------------------------------------------------------------------------------------------------ //

class USI_Debug {

   const VERSION = '1.1.0 (2017-11-12)';

   private static $message = null;
   private static $options = null;

   private function __construct() {
   } // __construct();

   public static function exception($e) {
      self::$message .= $e->GetMessage() . PHP_EOL . $e->GetTraceAsString() . PHP_EOL;
   } // exception();

   public static function get_message($keep = false) {
      $message_save = self::$message;
      if (!$keep) self::$message = null;
      return($message_save);
   } // get_message();

   public static function init($options = array('initialized' => true)) {
      if (empty(self::$options)) {
         self::$options = $options;
         register_shutdown_function(array(__CLASS__, 'shutdown'));
      }
   } // init();

   public static function message($message) {
      self::$message .= $message . PHP_EOL;
   } // message();

   public static function output($message = null) {
      if ($message) self::$message .= $message . PHP_EOL;
      echo self::$message;
      self::$message = null;
   } // output();

   public static function print_r($prefix, $array, $suffix = '') {
      self::$message .= $prefix . print_r($array, true) . $suffix . PHP_EOL;
   } // print_r();

   public static function shutdown() {
      if (self::$message && !empty(self::$options['log']) && is_callable(self::$options['log'])) {
         call_user_func(self::$options['log'], self::$message);
      }
   } // shutdown();

} // Class USI_Debug;

// --------------------------------------------------------------------------------------------------------------------------- // ?>