<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Admin\Dashboard::index');
$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    
    // Tambahkan rute lainnya di sini nanti
});

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginProcess');
$routes->get('logout', 'Auth::logout');
    
$routes->group('admin', ['filter' => 'authadmin'], function ($routes) {
$routes->get('dashboard', 'Admin\Dashboard::index');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('profil', 'Profil::index');
    $routes->post('profil/update', 'Profil::update');
});

// Routes untuk Sekolah (di dalam grup 'admin')
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('sekolah', 'Sekolah::index'); // Tampilkan daftar sekolah
    $routes->get('sekolah/create', 'Sekolah::create'); // Form tambah
    $routes->post('sekolah/store', 'Sekolah::store'); // Proses simpan

    $routes->get('sekolah/edit/(:num)', 'Sekolah::edit/$1'); // Form edit
    $routes->post('sekolah/update/(:num)', 'Sekolah::update/$1'); // Proses update

    $routes->get('sekolah/delete/(:num)', 'Sekolah::delete/$1'); // Proses hapus
});

    
