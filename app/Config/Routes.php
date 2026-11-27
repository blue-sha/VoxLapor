<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/balasan', 'Home::lapor');
$routes->get('/', 'Dashboard::index', ['filter' => 'login']);
$routes->get('arah', 'Home::arah', ['filter' => 'login']);          // BARU
$routes->get('admin', 'Admin\Dashboard::index', ['filter' => 'role:admin']);
$routes->get('lapor', 'Home::index');
$routes->post('lapor/simpan', 'Lapor::simpan');
$routes->get('riwayat', 'Riwayat::index', ['filter' => 'login']);
$routes->get('riwayat/(:num)', 'Riwayat::detail/$1', ['filter' => 'login']);
$routes->get('export','Export::export',['filter' =>'login']);

$routes->group('petugas', ['filter' => 'role:petugas,admin'], function ($routes) {   // BERUBAH
    $routes->get('/', 'Petugas::dashboard');
    $routes->get('keluhan', 'Petugas::keluhan');
    $routes->get('detail/(:num)', 'Petugas::detail/$1');
    $routes->post('proses/(:num)', 'Petugas::proses/$1');
});