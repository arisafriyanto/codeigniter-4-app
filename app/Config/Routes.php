<?php

use App\Controllers\{Comics, Pages};
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', [Home::class, 'index']);
// $routes->get('/coba', 'Home::coba');
// $routes->get('/coba', [Coba::class, 'index']);
// $routes->get('/coba/about', [Coba::class, 'about']);
// $routes->get('/coba/(:segment)', [Coba::class, 'about']);

$routes->get('/', [Pages::class, 'index']);
$routes->get("/pages/about", [Pages::class, 'about']);
$routes->get("/pages/contact", [Pages::class, 'contact']);

$routes->get("/comics", [Comics::class, 'index']);
$routes->get("/comics/create", [Comics::class, 'create']);
$routes->post("/comics/save", [Comics::class, 'save']);
$routes->delete("/comics/(:num)", [Comics::class, 'delete']);
$routes->get("/comics/edit/(:segment)", [Comics::class, 'edit']);
$routes->put("/comics/update/(:num)", [Comics::class, 'update']);
$routes->get("/comics/(:segment)", [Comics::class, 'detail']);
