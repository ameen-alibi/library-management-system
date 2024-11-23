<?php

namespace App\controllers;

use Core\View;
use Core\Request;
use Core\Response;

class HomeController
{
    public function index(Request $request,Response $response)
    {
        View::renderTemplate('home.php');
    }
}