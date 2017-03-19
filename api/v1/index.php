<?php
/**
 * Created by PhpStorm.
 * User: karol
 * Date: 14.03.2017
 * Time: 23:04
 */

define('DS',DIRECTORY_SEPARATOR);

define('ROOT',dirname(dirname(dirname(__FILE__))).DS);
define('SERVER_DIR', ROOT.'server'.DS);

require ROOT.'vendor'.DS.'autoload.php';

use Calculator\Server\RestServer;

$server = new RestServer;
exit();

//echo json_encode(['result' => 5], JSON_PRETTY_PRINT);

//var_dump($server);

//var_dump(ROOT_DIR);
//var_dump(APP_DIR);
//
//
//var_dump($_SERVER);