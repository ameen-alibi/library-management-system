<?php 

namespace Core;

class Request 
{
    public function getPath()
    {
        $url = filter_var($_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL);
        return parse_url($url,PHP_URL_PATH)??'/';
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBodyParam($param)
    {
        $method = strtoupper($this->getMethod());
        $superglobal = "_{$method}";
    
        return isset($GLOBALS[$superglobal][$param]) ? $GLOBALS[$superglobal][$param] : null;
    }
    
}