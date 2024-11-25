<?php

namespace Core;

class Token
{
    public static function generate()
    {
        return bin2hex(random_bytes(32)); 
    }

    public static function validate($token)
    {
        return hash_equals($_SESSION['token'] ?? '', $token);
    }
}
