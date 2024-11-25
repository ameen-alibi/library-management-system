<?php

namespace App\Controllers;

use Core\Auth;
use Core\View;
use Core\Token;
use Core\Request;
use Core\Response;
use App\Models\User;

class LoginController
{
    public function show(Request $request, Response $response)
    {
        View::renderTemplate('login.php');
    }

    public function login(Request $request, Response $response)
    {
        $email = filter_var($request->getBodyParam('email'), FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($request->getBodyParam('password'));

        if ($user = User::authenticate($email, $password)) {
            $token = Token::generate();
            Auth::login($user, $token);

            dump($_SESSION);
            header("Location: /library-home");
            exit;
        } else {
            $response->setErrors("Invalid credentials please try again .");
            header("Location : /login");
        }
    }
}
