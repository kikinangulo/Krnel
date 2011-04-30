<?php
class Views {
  private  $view_data = array();


  public function __construct($view = NULL){
    $this->view = $view;
  }

  public function load_view(){
    if(is_null($this->view)){
      include PATH_VIEWS."templates/header.php";
      include PATH_VIEWS.$this->view_data['view'].".php";
      include PATH_VIEWS."templates/footer.php";
    }else{
      include PATH_VIEWS.$this->view.".php";
    }
  }

  public function __set($key, $value){
    $this->view_data[$key]  = $value;
  }
}
?>
