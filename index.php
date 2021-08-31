<?php
session_start ();


define('BP',__DIR__ . DIRECTORY_SEPARATOR);
define('BP_APP',__DIR__ . DIRECTORY_SEPARATOR . 'app'. DIRECTORY_SEPARATOR);

//echo BP_APP;

$putanje = implode (
PATH_SEPARATOR,
[
    BP_APP .'model',
    BP_APP . 'controller'
]
);

//echo $putanje;

set_include_path($putanje);
spl_autoload_register(function($klasa){
    $putanje = explode(PATH_SEPARATOR,get_include_path());
    foreach ($putanje as $p){
        if(file_exists($p . DIRECTORY_SEPARATOR . $klasa . '.php' )){
            include $p . DIRECTORY_SEPARATOR . $klasa . '.php';
        }
    }
});

App::start();