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


    
