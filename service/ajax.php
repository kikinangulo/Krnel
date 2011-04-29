<?php
include '../inc/init.php';
class Ajax extends Application{
  public function get_secrets(){
    $offset   = $_REQUEST['offset'];
    $secrets  = parent::get_secrets($offset);
    $response = array();

    while( $row = $this->mysql->fetch($secrets, FETCH_OBJECT) ){
      $response[] = $row;
    }

    echo json_encode($response);
  }
}

$ajax   = new Ajax();
$method = $_REQUEST['method'];
$ajax->$method();