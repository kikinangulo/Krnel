<?php
require 'config.php';

function __autoload($class_name) {
    require_once "classes/" . $class_name . '.class' . '.php';
}

global $kernel;
$kernel = new Krnel();