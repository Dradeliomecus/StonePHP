<?php

/**
 * StonePHP - A PHP framework hard like rock
 *
 * @package StonePHP
 * @author Aurélien Wyngaard <aurelien.wyngaard@gmail.com>
 */

use Stone\Application;

/**
 * Defining some constants to be able to access
 * a folder much more faster
 */

define('STONEPHP_START', microtime(true));

define('DS', DIRECTORY_SEPARATOR);

define('HOME', __DIR__);
define('ROOT', dirname(HOME));
define('APP', ROOT.DS.'App');

define('CORE', ROOT.DS.'Core');
define('STONE', CORE.DS.'StonePHP');
define('LIB', CORE.DS.'Lib');

define('CONFIG', APP.DS.'Configuration');
define('CONTROLLER', APP.DS.'Controller');
define('MODEL', APP.DS.'Model');
define('PLUGIN', APP.DS.'Plugin');
define('VIEW', APP.DS.'View');

define('CSS', HOME.DS.'css');
define('IMG', HOME.DS.'img');
define('JS', HOME.DS.'js');

/**
 * Starts every composer libraries
 */
require_once LIB.DS.'autoload.php';

/**
 * Starts the framework by starting the Application
 */

require_once STONE.DS.'includes.php';

$app = new Application();

$app->start();