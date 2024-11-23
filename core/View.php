<?php

namespace Core;

class View
{
    // Rendering a view file 
    public static function render($view, $args = [])
    {
        extract($args);
        $file = base_path() . "\\app\\views\\$view";

        if(is_readable($file))
        {
            require $file ;
        }
        else {
            throw new \Exception("$file not found !");
        }
    }

    public static function renderTemplate($view,$args=[])
    {
        self::render($view,$args);
    }
    
    public static function renderPartial($partial,$args=[])
    {
        self::render("\\partials\\$partial",$args);
    }
}
