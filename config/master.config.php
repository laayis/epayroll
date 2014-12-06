<?php
if(!defined('INC_SOURCE')){die('Direct access not allowed!');}
if(!defined('BASEPATH')){die('Direct access not allowed!');}

$servers = array(
    'localserver'       =>  array('localhost'),
 );
//echo $servers['localserver'];
//echo $_SERVER['SERVER_NAME'];
if(in_array($_SERVER['SERVER_NAME'] , $servers['localserver'])) {
    ## localserver config
    ## admin configuration settings
    define('ADMIN_BASE_URL' , 'http://localhost:81/epayroll');

    ## root path
    define('ROOT_PATH' ,  __DIR__.'/../' );

    ## db settings
    define('DBHOST' , 'localhost');
    define('DBUSER' , 'root');
    define('DBPASS' , '');
    define('DBNAME' , 'epayroll');
}
else {
    ## for production server
    ## admin configuration settings
    define('ADMIN_BASE_URL' , '');

    ## db settings
    define('DBHOST' , '');
    define('DBUSER' , '');
    define('DBPASS' , '');
    define('DBNAME' , '');
}

## application specific settings
define('APP_PFIX' , 'MAPP_'); // application prefix
