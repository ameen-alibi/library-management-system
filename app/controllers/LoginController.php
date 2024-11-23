<?php

namespace App\Controllers;

use Core\View;
use Core\Request;
use Core\Response;
use App\Models\User;

class LoginController
{
    public function show(Request $request,Response $response)
    {
        View::renderTemplate('login.php');
    }

    public function login(Request $request,Response $response)
    {
        $email = filter_var($request->getBodyParam('email'), FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($request->getBodyParam('password'));

        if (User::authenticate($email,$password)) {
            echo "<h1>Login successfully</h1>";
            header("Location : /library-home");
            exit;
        } else {
            $_SESSION["errors"] = "Invalid credentials please try again .";
            header("Location : /login");
        }
    }

}
