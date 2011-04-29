var CALLBACK_URL  = "http://altodotdev.dyndns.org:8009/pll/";
var AJAX_URL      = CALLBACK_URL + "service/ajax.php";

$(document).ready(function(){
  main.init();
});

var main  = {};
var object= {};

main.init = function(){
  $(window).scroll(function(){ajax.appendSecrets()});
};

object.var_dump= function(obj){
  if(typeof obj == "object") {
    return "Type: "+typeof(obj)+((obj.constructor) ? "\nConstructor: "+obj.constructor : "")+"\nValue: " + obj;
  } else {
    return "Type: "+typeof(obj)+"\nValue: "+obj;
  }
};

object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};