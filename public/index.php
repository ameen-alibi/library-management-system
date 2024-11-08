<?php

require_once "functions.php";
require_once base_path() . "\\vendor\\autoload.php";

use Core\Application;

session_start();



$app = new Application();


$app->route('get', '/', function () {
    echo "<h1>Hello,world</h1>";
});

$app->route('get', '/books', function () {
    echo 'List of books';
});

$app->route('post', '/books', function () {
    return 'Add a new book';
});

$app->route('get', '/login', ['LoginController', 'show']);
$app->route('post', '/login', ['LoginController', 'login']);

$app->route('get', "/register", ['RegisterController', 'register']);

$app->route('get','/dashboard',function (){
    echo "Success ya haj";
});


$app->run();
