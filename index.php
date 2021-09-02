<?php

session_start();

if (!isset($_REQUEST['controller'])){
    $controller = 'DatosExportar';
}
else{
    $controller = $_REQUEST['controller'];
}

if (!isset($_REQUEST['action'])){
    $action = 'menu';
}
else{
    $action = $_REQUEST['action'];
}

include './Controller/'.$controller.'.php';

$objcontroller = new $controller;
$objcontroller->$action();

?>
