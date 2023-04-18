<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('emit', 'Clientcontrol::test');
$routes->post('clie/save', 'Clientcontrol::save');
$routes->post('jo', 'Clientcontrol::delete');
$routes->get('/mimi/(:num)', 'Clientcontrol::modif/$1');
$routes->post('/updatecli', 'Clientcontrol::updatecli');
$routes->get('jojo', 'Clientcontrol::vody');
$routes->get('/v', 'Clientcontrol::op');


$routes->get('logem', 'Logementcontrol::test');
$routes->post('clie/jo', 'Logementcontrol::save');
$routes->post('del', 'Logementcontrol::delete');
$routes->get('/log/(:num)', 'Logementcontrol::modif/$1');
$routes->post('/updatelog', 'Logementcontrol::updatecli');
$routes->get('jojo', 'Logementcontrol::logeme');

$routes->get('acha', 'Achatcontrol::teste');
$routes->post('clie/acha', 'Achetecontrol::save');
$routes->get('/achate/(:num)', 'Achatcontrol::modif/$1');

$routes->get('cli', 'Achetecontrol::diry');

$routes->get('vente', 'Achetecontrol::teste');
$routes->post('delt', 'Achetecontrol::delets');

$routes->get('login', 'Logincontrol::test');
$routes->post('log/check', 'Logincontrol::do_login');
$routes->get('lo', 'Logincontrol::testing');
$routes->post('log/save', 'Logincontrol::save');
$routes->post('delety', 'Logincontrol::deletv');
$routes->post('/updatelogin', 'Logincontrol::updatelog');
$routes->get('/lolo/(:num)', 'Logincontrol::modifv/$1');


$routes->get('client', 'AchetControl::index');

$routes->get('chart', 'charControl::stat');

$routes->get('/imprimpd','Impression::demoPDF');
// $routes->get('/mimi/(:num)', 'Impression::demoPDF/$1');


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
