<?php 
require '../app/Autoloader.php';
App\Autoloader::register();

if(basename($_SERVER['REQUEST_URI']) == 'tchat.php') {
    $controller = new App\Controllers\TchatController();
    $controller->tchat();
}elseif(basename($_SERVER['REQUEST_URI']) == 'message.php') {
     $controller = new App\Controllers\TchatController();
     $controller->message();
}elseif (basename($_SERVER['REQUEST_URI']) == 'display.php') {
     $controller = new App\Controllers\TchatController();
     $controller->display();
}
else{
    $controller = new App\Controllers\AuthentificationController();
    $controller->authentification();
}