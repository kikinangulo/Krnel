<?php
  // Constantes PATH
  define( "PATH_ROOT"       , realpath(dirname(__FILE__)."/..")."/" );
  define( "PATH_INCLUDE"    , PATH_ROOT."inc/" );
  define( "PATH_CLASSES"    , PATH_INCLUDE."classes/" );
  define( "PATH_CSS"        , PATH_ROOT."media/css/" );
  define( "PATH_JS"         , PATH_ROOT."media/js/" );
  define( "PATH_VIEWS"      , PATH_ROOT."inc/views/");

  // Constantes para uso de la clase mysql
	define( "FETCH_OBJECT"	, 1 );
	define( "FETCH_ARRAY"   , 2 );
	define( "FETCH_BOTH"    , 3 );
	define( "FETCH_FIELD"   , 4 );
	define( "FETCH_ROW"   	, 5 );
	define( "FETCH_NUM"     , 6 );
  define( "DB_HOST"       , "localhost" );
  define( "DB_USER"       , "root" );
  define( "DB_PASS"       , "" );
  define( "DB_NAME"       , "krnel" );

	//facebook application
  define( "APP_ID"        , "" );
  define( "API_KEY"       , "" );
  define( "API_SECRET"    , "" );
  define( "APP_NAME"      , "Krnel" );

  //set application urls here
  define( "CANVAS_URL"    , "http://apps.facebook.com/krnel/" );
  define( "CALLBACK_URL"  , "http://krnel.com/" );
  define( "FB_GRAPH"      , "https://graph.facebook.com/" );
  define( "FB_API"        , "https://api.facebook.com/" );
?>
