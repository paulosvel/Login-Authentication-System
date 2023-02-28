<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register']['GET'] = 'Auth/RegisterController/index';
$route['register']['POST'] = 'Auth/RegisterController/register';
$route['register/verify_email/(:any)'] = 'Auth/RegisterController/verify_email/$1';

$route['login']['GET'] = 'Auth/LoginController/index';
$route['login']['POST'] = 'Auth/LoginController/login';

$route['userpage']['GET'] = 'Auth/UserController/index';

$route['adminpage'] = 'Auth/AdminController/index';

$route['form'] = 'Auth/MessageController/index';
$route['create'] = 'Auth/MessageController/create';

$route['logout']['GET'] = 'Auth/LogoutController/logout';

$route['forgot']['GET'] = 'Auth/ForgotController/index';
$route['forgot']['POST'] = 'Auth/ForgotController/reset_password';
$route['forgot/send_email'] = 'Auth/ForgotController/send_email';

$route['forgot/reset_password'] = 'Auth/ForgotController/reset_password';
$route['forgot/update_password'] = 'Auth/ForgotController/update_password';
$route['reset_password/(:any)'] = 'Auth/ForgotController/reset_password/$1';



$route['update'] = 'Auth/UpdateController/update';

$route['history'] = 'Auth/MessageController/message_history';
// $route['history/(:any)'] = 'Auth/MessageController/message_history/$1';