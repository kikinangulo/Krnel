<?php
class Krnel{
  public $mysql;
  public $facebook;

  public function __construct(){
    $this->mysql    = new Mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, true);

    $this->facebook = new Facebook(array(
      'appId'  => APP_ID,
      'secret' => API_SECRET,
      'cookie' => true,
      'domain' => CALLBACK_URL
    ));
  }

  public static function factory(){
    $instance = new Krnel();
    return $instance;
  }

}