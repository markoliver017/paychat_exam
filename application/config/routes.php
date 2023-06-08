<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'employees';  //this will serve as landing page when you type ung CI folder http://localhost/ and the this controller should have a method name index
$route['add_employee'] = 'employees/new_employee';  //this will serve as landing page when you type ung CI folder http://localhost/ and the this controller should have a method name index
$route['login'] = 'employees/login';  //this will serve as landing page when you type ung CI folder http://localhost/ and the this controller should have a method name index
$route['logout'] = 'employees/logout';  //this will serve as landing page when you type ung CI folder http://localhost/ and the this controller should have a method name index
$route['manage_access_level'] = 'access_levels/index';  //this will serve as landing page when you type ung CI folder http://localhost/ and the this controller should have a method name index

