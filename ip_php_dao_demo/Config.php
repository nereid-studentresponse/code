<?php
// Singleton
class Config {

  private static $config;
  private $ini_array;
  
  private function __construct() {
    $this->ini_array = parse_ini_file("config.ini", true);
  }

  public static function getInstance() {
    if (!self::$config)
    {
        self::$config = new Config();
    }

    return self::$config;
  }

  public function getArray() {
    return $this->ini_array;
  }

}

?>
