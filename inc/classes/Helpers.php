<?php
  class Helpers{
    public static function valid($var, $return = FALSE){
      return isset($var) && ! is_null($var) ? $var : $return;
    }
    public static function vd($data){
      echo "<pre>";
      var_dump($data);
      echo "</pre>";
    }
  }