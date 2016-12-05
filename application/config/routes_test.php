<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'admin/dashboard/login';
 //$route['admin'] = 'admin/dashboard';            // router trang admin


/*------------route module admin-------------*/
//-------------- module block--------------
$route['admin/blocks/listBlocks'] = "blocks/listBlocks";
$route['admin/blocks/changeStatus'] = "blocks/changeStatus";
$route['admin/blocks/viewDetail'] = "blocks/viewDetail";
$route['admin/blocks/addBlocks'] = "blocks/addBlocks";
$route['admin/blocks/deleteOne/(:any)'] = "blocks/deleteOne/$1";
$route['admin/blocks/editBlocks/(:any)'] = "blocks/editBlocks/$1";
$route['admin/blocks/listOrderByPosition'] = "blocks/listOrderByPosition";
$route['admin/blocks/makeDirectory'] = "blocks/makeDirectory";

//-------------- module navigation--------------
$route['admin/navigation/listNavigation'] = "navigation/listNavigation";
$route['admin/navigation/changeStatus'] = "navigation/changeStatus";
$route['admin/navigation/viewDetail'] = "navigation/viewDetail";
$route['admin/navigation/addNavigation'] = "navigation/addNavigation";
$route['admin/navigation/deleteOne/(:any)'] = "navigation/deleteOne/$1";
$route['admin/navigation/editNavigation/(:any)'] = "navigation/editNavigation/$1";
$route['admin/navigation/listOrderByPosition'] = "navigation/listOrderByPosition";

//-------------- module advertise--------------
$route['admin/advertise/listAdvertise'] = "advertise/listAdvertise";
$route['admin/advertise/changeStatus'] = "advertise/changeStatus";
$route['admin/advertise/viewDetail'] = "advertise/viewDetail";
$route['admin/advertise/addAdvertise'] = "advertise/addAdvertise";
$route['admin/advertise/deleteOne/(:any)'] = "advertise/deleteOne/$1";
$route['admin/advertise/editAdvertise/(:any)'] = "advertise/editAdvertise/$1";
$route['admin/advertise/listOrderByPosition'] = "advertise/listOrderByPosition";

//-------------- module video--------------
$route['admin/video/listVideo'] = "video/listVideo";
$route['admin/video/changeStatus'] = "video/changeStatus";
$route['admin/video/viewDetail'] = "video/viewDetail";
$route['admin/video/addVideo'] = "video/addVideo";
$route['admin/video/deleteOne/(:any)'] = "video/deleteOne/$1";
$route['admin/video/editVideo/(:any)'] = "video/editVideo/$1";
$route['admin/video/listOrderByPosition'] = "video/listOrderByPosition";



// ------------ module generation--------------
$route['admin/generation/genModel/(:any)/(:any)'] = "generation/genModel/$1/$2";
$route['admin/generation/genModel'] = "generation/genModel";
$route['admin/generation/genModel/'] = "generation/genModel/";
$route['admin/generation/genView/(:any)'] = "generation/genView/$1";
$route['admin/generation/genView'] = "generation/genView";
$route['admin/generation/genView/'] = "generation/genView/";
$route['admin/generation/genViewDetail/(:any)'] = "generation/genViewDetail/$1";
$route['admin/generation/genViewDetail'] = "generation/genViewDetail";
$route['admin/generation/genViewDetail/'] = "generation/genViewDetail/";




// -----------------------------------------------------------------------------------------------------
/*------------router khách-----------------*/
include "routes_client.php";

