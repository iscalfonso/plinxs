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

class Router 
{

    public $httpRoutes = [
        'GET'       => [],
        'POST'      => [],
        'PUT'       => [],
        'DELETE'    => [],
    ];

    public static function load($file)
    {
        $route = new static;
        require $file;
        return $route;
    }

    public function run($uri, $request)
    {
        if(!array_key_exists($uri, $this->httpRoutes[$request]))
            throw new Exception("Bad Route");
        return $this->httpRoutes[$request][$uri];
            
    }

    public function get($uri, $controller)
    {
        $this->httpRoutes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->httpRoutes['POST'][$uri] = $controller;
    }

    public function put($uri, $controller)
    {
        $this->httpRoutes['PUT'][$uri] = $controller;
    }

    public function delete($uri, $controller)
    {
        $this->httpRoutes['DELETE'][$uri] = $controller;
    }
}