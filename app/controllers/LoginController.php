<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;

class LoginController
{
    public function show($request)
    {
        View::renderTemplate('login.php');
    }

    public function login($request)
    {
        $email = filter_var($request->getBodyParam('email'), FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($request->getBodyParam('password'));

        if (User::authenticate($email,$password)) {
            echo "<h1>Login successfully</h1>";
            exit;
        } else {
            $_SESSION["errors"] = "Invalid credentials please try again .";
            header("Location : /login");
        }
    }

    private function getUserByEmail() {}
}
