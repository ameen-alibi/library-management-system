<?php 

// Actually, I don't need this . I just used it to test pagination and also to get familiar with APIs 

namespace Core;

use Exception;

class ApiHandler
{
    public static function fetchBooks($query)
    {
        $url = 'https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query) . "&maxResults=16&startIndex=0";

        $url = filter_var($url,FILTER_SANITIZE_URL);

        $curl_session = curl_init();
        curl_setopt($curl_session,CURLOPT_URL,$url);
        curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($curl_session);
        curl_close($curl_session);

        if($response===false)
        {
            throw new Exception("Error fetching data from API");
        }
        return json_decode($response,true);
    }
}