<?php
//Load config
require_once 'config/config.php';
//Load Libraries
// require_once "libraries/Core.php";
// require_once "libraries/Controller.php";
// require_once "libraries/Database.php";


//Autoload Core Libraries
//register every class that exists in Libraries folder instead of doing one by one
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});