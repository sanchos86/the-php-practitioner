<?php

use Core\{App, Request};
use Dotenv\Dotenv;

error_reporting(E_ALL);
require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'core/bootstrap.php';

App::get('router')->direct(Request::uri(), Request::requestMethod());
