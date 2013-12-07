<?php
require_once "Config.php";

class DB {
  private $dbHost;
  private $dbName;
  private $dbUser;
  private $dbPassword;

  function __construct($dbHost, $dbName, $dbUser, $dbPassword) {
      $this->dbHost=$dbHost;
      $this->dbName=$dbName;
      $this->dbUser=$dbUser;
      $this->dbPassword=$dbPassword;
  }
  
   /**
   * "Constructor" from config
   * Use it this way: DB::withConfig() this will return a new DB
   */
  public static function withConfig() {
    $config = Config::getInstance();
    $array = $config->getArray()['database'];
    // debug
    error_log("Array: ".print_r($array,true));
    $instance = new self($array['host'], $array['name'], $array['user'], $array['password']);
    return $instance;
  }

  function createConnexion() {
      return new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", 
                  $this->dbUser, $this->dbPassword);
  }
}
?>
