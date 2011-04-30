<?php
include '../inc/init.php';

class Ajax extends Application{

  public function __construct($method, $params) {
    $method = Helpers::camelize($method);
    $this->$method($params);
  }

  public function testAjaxService(array $params) {
    echo json_encode($params);
  }

}

try {
  $Ajax = new Ajax($_REQUEST['method'], $_REQUEST['params']);
} catch (Exception $exc) {
  echo $exc->getTraceAsString();
}
