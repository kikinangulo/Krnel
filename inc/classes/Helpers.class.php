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
    public static function camelize($str, $capitalise_first_char = false) {
		  if ($capitalise_first_char) {
		    $str[0] = strtoupper($str[0]);
		  }
		  $func = create_function('$c', 'return strtoupper($c[1]);');
		  return preg_replace_callback('/_([a-z])/', $func, $str);
		}
  }
