<?php

use Core\{App, Router};

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

App::bind('router', Router::load('app/routes.php'));

function view($name, $options = []) {
    extract($options);

    require "app/views/{$name}.view.php";
}

function redirect($to) {
    header("Location: /{$to}");
}
