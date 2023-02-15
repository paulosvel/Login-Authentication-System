<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register']['GET'] = 'Auth/RegisterController/index';
$route['register']['POST'] = 'Auth/RegisterController/register';
$route['login']['GET'] = 'Auth/LoginController/index';
$route['login']['POST'] = 'Auth/LoginController/login';
$route['userpage']['GET'] = 'Auth/UserController/index';
$route['adminpage']['GET'] = 'Auth/AdminController/index';
$route['create']['GET'] = 'Auth/MessageController/create';
$route['logout']['GET'] = 'Auth/LogoutController/logout';
$route['forgot']['GET'] = 'Auth/ForgotController/index';