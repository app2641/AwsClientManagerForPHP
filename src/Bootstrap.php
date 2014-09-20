<?php

defined('ROOT') || define('ROOT', realpath(__DIR__.'/../'));
defined('LIB') || define('LIB', ROOT.'/src');

$loader = require_once ROOT.'/vendor/autoload.php';
$loader->set('Acf', LIB);

