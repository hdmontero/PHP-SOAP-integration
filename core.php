<?php
// set up cache for soap wsdl
ini_set('soap.wsdl_cache_enabled', '0'); 
ini_set('soap.wsdl_cache_ttl', '0');

// Server document root
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

// custom load of files
function customFileLoad($path, $once = true) {
    if($once){
        require_once(DOCUMENT_ROOT . $path);
    } else {
        require(DOCUMENT_ROOT . $path);
    }
}

// used to print variables to debug
function dd($element) {
    print_r($element);
	die;
}

// include constants file
customFileLoad('/config/constants.php');
