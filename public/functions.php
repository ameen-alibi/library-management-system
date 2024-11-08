<?php

function base_path()
{
    return dirname(__DIR__);
}


function dump($var)
{
    echo '<pre';
    var_dump($var);
    echo '</pre>';
}
