<?php 

namespace Core;

class Request
{
    public static function uri()
    {
        return trim(parse_url($controller, PHP_URL_PATH), '/');
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}