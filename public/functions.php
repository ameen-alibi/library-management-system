<?php

function base_path($file)
{
    return dirname(__DIR__) . "\\" . $file;
}


function dump($var)
{
    echo '<pre';
    var_dump($var);
    echo '</pre>';
}
