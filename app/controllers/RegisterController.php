<?php

namespace App\Controllers;

use Core\View;
use Core\Request;
use Core\Response;
use App\Models\User;

class RegisterController
{
    public function show(Request $request, Response $response)
    {
        View::renderTemplate('register.php');
    }
    public function register(Request $request, Response $response)
    {
        $username = htmlspecialchars($request->getBodyParam('username'), ENT_QUOTES, 'UTF-8');
        $email = filter_var($request->getBodyParam('email'), FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($request->getBodyParam('phone'), ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($request->getBodyParam('password'), ENT_QUOTES, 'UTF-8');
        $confirmPassword = htmlspecialchars($request->getBodyParam('confirm-password'), ENT_QUOTES, 'UTF-8');
        // Create User instance
        $user = new User([
            "username" => $username,
            "email" => $email,
            "phone" => $phone,
            "password" => $password,
            "confirm_password" => $confirmPassword
        ]);
        // Validate it 
        if ($user->save($response)) {
            header("Location: /login");
            exit;
        }
        print("<br>");
        dump($response->getErrors());
    }
}
