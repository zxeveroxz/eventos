<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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

//$route['usuarios'] = 'usuarios/index';

$route['(:any)'] = 'logeo/ver/$1';
$route['(:any)/validar'] = 'logeo/validar';
$route['(:any)/salir'] = 'logeo/salir';
$route['(:any)/panel'] = 'logeo/panel';


$CASOS = ['matriculas','usuarios','expositores','eventos','eventos_aperturas','participantes','ubigeo'];


foreach($CASOS as $c){
    $route["(:any)/$c"] = "$c/index";
    $route["(:any)/$c/get"] = "$c/get";
    $route["(:any)/$c/form/(:any)"] = "$c/form/$2";
    $route["(:any)/$c/validar"] = "$c/validar";
    $route["(:any)/$c/crear"] = "$c/crear";
    $route["(:any)/$c/save"] = "$c/save";
    $route["(:any)/$c/buscar"] = "$c/buscar";
    $route["(:any)/$c/buscarAll"] = "$c/buscarAll";
    $route["(:any)/$c/foto/(:any)/(:any)"] = "$c/foto/$2/$3";
}

$route["(:any)/ubigeo/ver"] = "ubigeo/ver";
$route["(:any)/ubigeo/dep"] = "ubigeo/dep";
$route["(:any)/ubigeo/pro/(:any)"] = "ubigeo/pro/$2";
$route["(:any)/ubigeo/dis/(:any)/(:any)"] = "ubigeo/dis/$2/$3";

$route["(:any)/varios/dni_buscar/(:any)"] = "varios/dni_buscar/$2"; 



$route['default_controller'] = 'logeo';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;



//$route['(.+)'] = 'logeo/$1';
