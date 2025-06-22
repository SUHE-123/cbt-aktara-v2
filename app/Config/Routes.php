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


$routes->group('admin', function($routes) {
    $routes->get('siswa', 'Admin\Siswa::index');
    $routes->get('siswa/create', 'Admin\Siswa::create');
    $routes->post('siswa/store', 'Admin\Siswa::store');
    $routes->get('siswa/edit/(:num)', 'Admin\Siswa::edit/$1');
    $routes->post('siswa/update/(:num)', 'Admin\Siswa::update/$1');
    $routes->post('siswa/delete/(:num)', 'Admin\Siswa::delete/$1');

    $routes->get('guru', 'Admin\Guru::index');
    $routes->get('guru/create', 'Admin\Guru::create');
    $routes->post('guru/store', 'Admin\Guru::store');
    $routes->get('guru/edit/(:num)', 'Admin\Guru::edit/$1');
    $routes->post('guru/update/(:num)', 'Admin\Guru::update/$1');
    $routes->post('guru/delete/(:num)', 'Admin\Guru::delete/$1');
});

