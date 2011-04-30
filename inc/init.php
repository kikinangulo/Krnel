<?php
require 'config.php';

function __autoload($class_name) {
    require_once "classes/" . $class_name . '.class' . '.php';
}

$facebook = new Facebook(array(
  'appId'  => APP_ID,
  'secret' => API_SECRET,
  'cookie' => true,
  'domain' => CALLBACK_URL
));

try {
  $fbSession = $facebook->getSession();
} catch (Exception $exc) {
  //Nothing else matters
}

global $app;
$app  = new Application();
