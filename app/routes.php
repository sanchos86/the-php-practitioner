<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contacts', 'PagesController@contacts');
$router->get('tasks', 'TasksController@index');
$router->get('404', 'PagesController@notFound');

$router->post('tasks', 'TasksController@store');
