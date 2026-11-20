<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index', ['filter' => 'login']);
$routes->get('admin', 'Admin\Dashboard::index', ['filter' => 'role:admin']);
