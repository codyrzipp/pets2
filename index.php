<?php

//this is our controller!

//start session
session_start();
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /@item', function ($f3, $param) {
    $item = $param["item"];
    switch($item){
        case "chicken":
            echo "<p>Cluck</p>";
            break;
        case "dog":
            echo "<p>Woof</p>";
            break;
        case "pig":
            echo "<p>Oink</p>";
            break;
        case "horse":
            echo "<p>Neigh</p>";
            break;
        case "bird":
            echo "<p>Chirp</p>";
            break;
        default:
            $f3->error(404);
            break;
    }
});

//run fat free
$f3 -> run();