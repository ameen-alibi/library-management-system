<?php

require_once "functions.php";
require_once base_path("\\vendor\\autoload.php");

use Core\Application;
use Core\Router;
session_start();



$app = new Application();


$app->route('get','/', function () {
    echo "<h1>Hello,world</h1>";
});

$app->route('get','/books', function () {
    echo 'List of books';
});

$app->route('post','/books', function () {
    return 'Add a new book';
});

$app->route('post', '/submit', function($request, $response) {
    // Process the request body
    $data = $request->getBody(); // Assuming you have a method to retrieve the request body

    // Send a response
    return $response->setBody('Data submitted successfully');
});

$app->route('post', '/submit', function($request, $response) {
    // Process the request
    $data = $request->getBody();

    // Set response body
    $response->setBody('Data submitted successfully');

    // Output the response (ensure this line exists)
    echo $response->getBody();
});



// Run the app
$app->run();