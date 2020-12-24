<?php namespace Config;

use App\Views\PortalHRD\ViewRoutesContract;
use CodeIgniter\Router\RouteCollection;

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
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

$routes->group('/', function(RouteCollection $routes) {
	$routes->get('', 'PortalHRD\Auth::login', ['as' => ViewRoutesContract::PORTALHRD_LOGIN]);
	$routes->get('login', 'PortalHRD\Auth::login', ['as' => ViewRoutesContract::PORTALHRD_LOGIN]);
	
	$routes->get('logout', 'PortalHRD\Auth::logout', ['as' => ViewRoutesContract::PORTALHRD_LOGOUT]);

	$routes->get('dashboard', 'PortalHRD\Dashboard::index', ['as' => ViewRoutesContract::PORTALHRD_DASHBOARD]);

	$routes->group('vacancy', function(RouteCollection $routes) {
		$routes->get('', 'PortalHRD\Vacancy::list', ['as' => ViewRoutesContract::PORTALHRD_VACANCYLIST]);

		//$routes->get('?(:any)', 'PortalHRD\Vacancy::list', ['as' => ViewRoutesContract::PORTALHRD_VACANCYLISTWITHGETPARAMS]);

		$routes->get('detail/(:alphanum)', 'PortalHRD\Vacancy::detail/$1', ['as' => ViewRoutesContract::PORTALHRD_VACANCYDETAIL]);

		$routes->get('add', 'PortalHRD\Vacancy::add', ['as' => ViewRoutesContract::PORTALHRD_ADDVACANCY]);

		$routes->post('add', 'PortalHRD\Vacancy::saveFormAdd', ['as' => ViewRoutesContract::PORTALHRD_ADDVACANCY]);

		$routes->get('edit/(:alphanum)', 'PortalHRD\Vacancy::edit/$1', ['as' => ViewRoutesContract::PORTALHRD_EDITVACANCY]);

		$routes->post('edit', 'PortalHRD\Vacancy::saveFormEdit', ['as' => ViewRoutesContract::PORTALHRD_SAVEEDITFORMVACANCY]);

		$routes->post('delete/(:alphanum)', 'PortalHRD\Vacancy::delete/$1', ['as' => ViewRoutesContract::PORTALHRD_DELETEVACANCY]);
	});

	$routes->group('manage-user', function(RouteCollection $routes) {
		$routes->get('', 'PortalHRD\Users::userList', ['as' => ViewRoutesContract::PORTALHRD_MANAGEUSER_USERLIST]);
		$routes->post('add-user', 'PortalHRD\Users::addUser', ['as' => ViewRoutesContract::PORTALHRD_ADDUSER]);
		$routes->get('delete-user/(:aplhanum)', 'PortalHRD\Users::deleteUser/$1', ['as' => ViewRoutesContract::PORTALHRD_DELETEUSER]);

		$routes->get('group-list', 'PortalHRD\Users::groupList', ['as' => ViewRoutesContract::PORTALHRD_MANAGEUSER_GROUPLIST]);
		$routes->post('add-group', 'PortalHRD\Users::addGroup', ['as' => ViewRoutesContract::PORTALHRD_ADDGROUPUSER]);
		$routes->get('delete-group/(:aplhanum)', 'PortalHRD\Users::deleteGroup/$1', ['as' => ViewRoutesContract::PORTALHRD_DELETEGROUPUSER]);

		$routes->get('permission-list', 'PortalHRD\Users::permissionList', ['as' => ViewRoutesContract::PORTALHRD_MANAGEUSER_PERMISSIONLIST]);
		$routes->post('add-permission', 'PortalHRD\Users::addPermission', ['as' => ViewRoutesContract::PORTALHRD_ADDPERMISSIONUSER]);
		$routes->get('delete-permission/(:aplhanum)', 'PortalHRD\Users::deletePermission/$1', ['as' => ViewRoutesContract::PORTALHRD_DELETEPERMISSIONUSER]);
	});

	$routes->get('notification', 'PortalHRD\Notification::list', ['as' => ViewRoutesContract::PORTALHRD_NOTIFICATIONLIST]);
});

$routes->group('/api', [
	'namespace' => 'App\Controllers\Api'
], function(RouteCollection $routes) {

	$routes->get('vacancy', 'Vacancy::all');
	
	$routes->get('vacancy/(:alphanum)', 'Vacancy::detail/$1');

	$routes->post('apply', 'Applicants::apply');
});



/**
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
