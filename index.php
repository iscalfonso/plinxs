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

require Core\Router::load(__DIR__.'/app/Routes.php')
    ->run(Core\Request::uri(), Core\Request::method());