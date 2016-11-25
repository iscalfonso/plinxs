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
        if(!array_key_exists($uri, $this->httpRoutes[$request])){
            throw new Exception("Bad Route");
        }
        return $this->extractControllerMethod($this->httpRoutes[$request][$uri]);
    }

    public function get($uri, $controllerMethod)
    {
        $this->httpRoutes['GET'][$uri] = $controllerMethod;
    }

    public function post($uri, $controllerMethod)
    {
        $this->httpRoutes['POST'][$uri] = $controllerMethod;
    }

    public function put($uri, $controllerMethod)
    {
        $this->httpRoutes['PUT'][$uri] = $controllerMethod;
    }

    public function delete($uri, $controllerMethod)
    {
        $this->httpRoutes['DELETE'][$uri] = $controllerMethod;
    }

    private function extractControllerMethod($controllerMethod)
    {
        $data = explode('@', $controllerMethod);
        return [
            'controller'    => $data[0],
            'method'        => $data[1],
        ];
    }
}