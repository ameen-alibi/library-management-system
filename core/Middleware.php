<?php

namespace Core;

class Middleware
{
    public static function handle()
    {
        if (!Auth::check()) {
            header("Location: /login");
            exit;
        }
    }
}
