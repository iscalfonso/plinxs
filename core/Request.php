<?php 

/**
 *
 * PlinXS Framework
 *
 * @author Alfonso Jimenez Cruz
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 * @version 0.1.0
 * 
 */

namespace Core;

class Request
{
    public static function uri()
    {
        dd(trim(parse_url($controller, PHP_URL_PATH), '/'));exit();
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}