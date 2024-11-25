<?php

namespace Core;

class Auth
{
    public static function login($user, $token)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['token'] = $token;
    }

    public static function logout()
    {
        unset($_SESSION['user_id'], $_SESSION['token']);
        session_destroy();
    }

    public static function check()
    {
        return isset($_SESSION['user_id']) && isset($_SESSION['token']);
    }

    public static function user()
    {
        return $_SESSION['user_id'] ?? null;
    }
}
