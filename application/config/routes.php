<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'web';
$route['404_override'] = 'error/not_found';
$route['translate_uri_dashes'] = FALSE;


$route['detalle_producto/(:num)']  = 'web/detalle_producto/$1';
