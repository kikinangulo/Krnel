<?php
require 'config.php';
require 'classes/Mysql.class.php';
require 'classes/Facebook.php';
require 'classes/Views.php';
require 'classes/Helpers.php';

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

require_once 'classes/Application.php';

global $app;
$app  = new Application();