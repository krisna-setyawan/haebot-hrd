<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'AuthController::login');

$routes->group('', ['filter' => 'isLoggedIn'], function ($routes) {
    $routes->get('/dashboard', 'Dashboard::index', ['filter' => 'permission:Dashboard']);

    $routes->get('/menu/master', 'Menu::Data_master', ['filter' => 'permission:Data Master']);
    $routes->get('/menu/pembelian', 'Menu::Pembelian', ['filter' => 'permission:Pembelian']);
    $routes->get('/menu/penjualan', 'Menu::Penjualan', ['filter' => 'permission:Penjualan']);
    $routes->get('/menu/produksi', 'Menu::Produksi', ['filter' => 'permission:Produksi']);
    $routes->get('/menu/gudang', 'Menu::Gudang', ['filter' => 'permission:Gudang']);
    $routes->get('/menu/inventaris', 'Menu::Inventaris', ['filter' => 'permission:Inventaris']);
    $routes->get('/menu/akuntansi', 'Menu::Akuntansi', ['filter' => 'permission:Akuntansi']);
    $routes->get('/menu/sdm', 'Menu::SDM', ['filter' => 'permission:SDM']);
    $routes->get('/menu/laporan', 'Menu::Laporan', ['filter' => 'permission:Laporan']);

    // $routes->resource('group', ['filter' => 'permission:Master Group']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
