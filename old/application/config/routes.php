<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'logincontroller/login';
$route['login'] = 'logincontroller/login';
$route['logout'] = 'logincontroller/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'stockcontroller/dashboard';

$route['home'] = 'logincontroller/login';

$route['stock/list'] = 'stockcontroller/lists';
$route['stock/add'] = 'stockcontroller/add';
$route['stock/edit/(:num)'] = 'stockcontroller/edit/$1';
$route['stock/delete/(:num)'] = 'stockcontroller/delete/$1';


$route['request'] = 'stockcontroller/request';
$route['approver'] = 'stockcontroller/approver';
$route['ris'] = 'stockcontroller/ris';
$route['wish/(:num)'] = 'stockcontroller/wish/$1';