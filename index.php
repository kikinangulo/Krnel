<?php
  include 'inc/init.php';

  $view         = new Views('index');
  $view->hello  = "hola";
  $view->load_view();
?>
