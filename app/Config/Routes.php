<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
$routes->get('/', 'Login::index');
$routes->get('login', 'Login::index');
$routes->post('login/proses', 'Login::proses');
$routes->get('logout', 'Login::logout');


/*
|--------------------------------------------------------------------------
| ADMIN (PROTECTED)
|--------------------------------------------------------------------------
*/
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {

    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Franchise
    $routes->get('franchise','Admin\Franchise::index');
    $routes->get('franchise/tambah','Admin\Franchise::tambah');
    $routes->post('franchise/simpan','Admin\Franchise::simpan');
    $routes->get('franchise/edit/(:num)','Admin\Franchise::edit/$1');
    $routes->post('franchise/update/(:num)','Admin\Franchise::update/$1');
    $routes->get('franchise/hapus/(:num)','Admin\Franchise::hapus/$1');

    // Produk
    $routes->get('produk','Admin\Produk::index');
    $routes->get('produk/tambah','Admin\Produk::tambah');
    $routes->post('produk/simpan','Admin\Produk::simpan');
    $routes->get('produk/edit/(:num)','Admin\Produk::edit/$1');
    $routes->post('produk/update/(:num)','Admin\Produk::update/$1');
    $routes->get('produk/hapus/(:num)','Admin\Produk::hapus/$1');

    // Bahan
    $routes->get('bahan', 'Admin\Bahan::index');
    $routes->get('bahan/tambah','Admin\Bahan::tambah');
    $routes->post('bahan/simpan','Admin\Bahan::simpan');
    $routes->get('bahan/edit/(:num)','Admin\Bahan::edit/$1');
    $routes->post('bahan/update/(:num)','Admin\Bahan::update/$1');
    $routes->get('bahan/hapus/(:num)','Admin\Bahan::hapus/$1');

    // Pemesanan
    $routes->get('pemesanan', 'Admin\Pemesanan::index');
    $routes->get('pemesanan/proses/(:num)', 'Admin\Pemesanan::proses/$1');
    $routes->get('pemesanan/kirim/(:num)', 'Admin\Pemesanan::kirim/$1');
    $routes->get('pemesanan/selesai/(:num)', 'Admin\Pemesanan::selesai/$1');
    $routes->get('pemesanan/tolak/(:num)', 'Admin\Pemesanan::tolak/$1');

    // Bagi Hasil
    $routes->get('bagi_hasil', 'Admin\BagiHasil::index');

    // Manajemen User Mitra
    $routes->get('user', 'Admin\User::index');
    $routes->get('user/tambah', 'Admin\User::tambah');
    $routes->post('user/simpan', 'Admin\User::simpan');
    $routes->get('user/hapus/(:num)', 'Admin\User::hapus/$1');
});


/*
|--------------------------------------------------------------------------
| MITRA (PROTECTED)
|--------------------------------------------------------------------------
*/
$routes->group('mitra', ['filter' => 'role:mitra'], function($routes) {

    $routes->get('dashboard', 'Mitra\Dashboard::index');

    // Pemesanan
    $routes->get('pemesanan', 'Mitra\Pemesanan::index');
    $routes->get('pemesanan/tambah', 'Mitra\Pemesanan::tambah');
    $routes->post('pemesanan/simpan', 'Mitra\Pemesanan::simpan');

    // Penjualan
    $routes->get('penjualan','Mitra\Penjualan::index');
    $routes->get('penjualan/tambah','Mitra\Penjualan::tambah');
    $routes->post('penjualan/simpan','Mitra\Penjualan::simpan');
    $routes->get('penjualan/detail/(:num)', 'Mitra\Penjualan::detail/$1');

    // Produk
    $routes->get('produk', 'Mitra\Produk::index');

    // Rekap harian
    $routes->get('rekap-harian', 'Mitra\RekapHarian::index');

    // Bagi Hasil
    $routes->get('bagi_hasil', 'Mitra\BagiHasil::index');
});


/*
|--------------------------------------------------------------------------
| OWNER (PROTECTED)
|--------------------------------------------------------------------------
*/
$routes->group('owner', ['filter' => 'role:owner'], function($routes) {

    $routes->get('dashboard', 'Owner\Dashboard::index');

    $routes->get('bagi_hasil', 'Owner\BagiHasil::index');
    $routes->get('laporan/omset', 'Owner\Laporan::omset');
    $routes->get('laporan/pdf', 'Owner\Laporan::exportPdf');
});


/*
|--------------------------------------------------------------------------
| GLOBAL (OPTIONAL - kalau mau dibatasi juga bisa)
|--------------------------------------------------------------------------
*/
$routes->get('penjualan','Penjualan::index');
$routes->get('penjualan/tambah','Penjualan::tambah');
$routes->post('penjualan/simpan','Penjualan::simpan');

$routes->get('laporan','Penjualan::laporan');
$routes->get('laporan/pdf','Penjualan::exportPDF');

$routes->get('penjualan/detail/(:num)', 'Penjualan::detail/$1');