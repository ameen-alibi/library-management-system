<?php 

namespace Core;

class Response
{
    private string $body;
    
    public function setResponseCode(int $code)
    {
        http_response_code($code);
    }

    public function setBody(string $body): string
    {
        $this->body = $body;
        return $this->body; // Ensure it returns the body for debugging
    }

    public function getBody(): string
    {
        return $this->body;
    }
}