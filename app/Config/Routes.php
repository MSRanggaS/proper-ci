<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Pages::index');
$routes->get('/form/(:segment)', 'Pages::form/$1');
$routes->get('/attemp/(:segment)', 'Pages::attemp/$1');
$routes->get('/result/(:any)', 'Pages::result/$1');
$routes->get('/result_mail/view/detail/(:any)', 'Pages::resultdetail/$1');
$routes->get('/printpdf', 'Pages::printpdf');

// FOR ADMIN
$routes->get('/csr_adm/conf_admin', 'Admin_conf::conf_admin');
$routes->post('/csr_adm/conf_admin/register', 'Admin_conf::register');
$routes->post('/csr_adm/conf_admin/login', 'Admin_conf::login');
$routes->get('/logout', 'Admin_conf::logout');

$routes->get('/csr_adm/adm_aspect', 'Aspect::adm_aspect');
$routes->get('/csr_adm/adm_aspect/(:num)', 'Aspect::subaspect/$1');
$routes->post('/csr_adm/adm_aspect/add', 'Aspect::addaspect');
$routes->post('/csr_adm/adm_aspect/subaspect/add', 'Aspect::addsubaspect');
$routes->post('/csr_adm/adm_aspect/subaspect/delete/(:num)', 'Aspect::delsubaspect/$1');
$routes->post('/csr_adm/adm_aspect/delete/(:num)', 'Aspect::delaspect/$1');

$routes->get('/csr_adm/adm_question', 'Question::adm_question');
$routes->post('/csr_adm/adm_question/add', 'Question::store');
$routes->delete('/csr_adm/adm_question/(:num)', 'Question::destroy/$1');
$routes->get('/csr_adm/adm_question/edit/(:num)', 'Question::edit/$1');
$routes->post('/csr_adm/adm_question/edit/save', 'Question::store_edit');

$routes->get('/csr_adm/adm_respondent/review', 'Respondent::review');
$routes->get('/csr_adm/adm_respondent/validated', 'Respondent::valid');
$routes->get('/csr_adm/adm_respondent/draft', 'Respondent::draft');
$routes->get('/csr_adm/adm_respondent/drop/(:num)', 'Respondent::drop/$1');
$routes->get('/csr_adm/adm_respondent/validate/(:num)', 'Respondent::val/$1');
$routes->get('/csr_adm/adm_respondent/invalidate/(:num)', 'Respondent::inval/$1');

$routes->get('/csr_adm/adm_result', 'Result::adm_result');

// FOR RESPONDENT
$routes->post('/start', 'Respondent::store_user');
$routes->post('/finishattemp', 'Result::store_attemp');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
