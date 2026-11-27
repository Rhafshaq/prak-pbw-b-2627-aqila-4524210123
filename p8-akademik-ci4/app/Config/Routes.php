<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Daftar mahasiswa
$routes->get('/mahasiswa', 'MahasiswaController::index');

// Tambah mahasiswa
$routes->get('/mahasiswa/tambah', 'MahasiswaController::create');
$routes->post('/mahasiswa/simpan', 'MahasiswaController::store');

// Ubah mahasiswa
$routes->get('/mahasiswa/ubah/(:num)', 'MahasiswaController::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'MahasiswaController::update/$1');

// Hapus mahasiswa
$routes->get('/mahasiswa/hapus/(:num)', 'MahasiswaController::delete/$1');