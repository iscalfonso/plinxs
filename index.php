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

require 'vendor/autoload.php';

define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 */
switch (ENVIRONMENT)
{
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
    break;

    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>='))
        {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        }
        else
        {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
    break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}

$ds     = DIRECTORY_SEPARATOR;
$data   = Core\Router::load(__DIR__ . "{$ds}app{$ds}Routes.php")
    ->run(Core\Request::uri(), Core\Request::method());

$nameController = ucfirst($data['controller']) . 'Controller';

require __DIR__ . "{$ds}app{$ds}controllers{$ds}{$nameController}.php";

$controller = new $nameController;
$method = empty($data['method'])? 'index': $data['method'];
$controller->$method();