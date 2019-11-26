<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['departamentos'] = 'DepartamentoController';
$route['departamentos/insert'] = 'DepartamentoController/insertDepartamento';
$route['departamentos/guardar'] = 'DepartamentoController/guardar';

$route['api/departamentos'] = 'ApiController/departamentos';

$route['api/salas'] = 'ApiController/salas';

//Trucazo
$route['api/solicitudes/(:any)'] = 'ApiController/solicitudes/$1';

$route['api/eventos'] = 'ApiController/eventos';
$route['api/dependencias'] = 'ApiController/dependencias';

$route['api/login'] = 'ApiController/login';

// php -S 127.0.0.1:9000

