<?php 

/**
 *
 * PlinXS Framework
 * 
 */

require 'vendor/autoload.php';

require Core\Router::load(__DIR__.'config/routes.php')
    ->run(Core\Request::uri(), Core\Request::method());