<?php
$acl['Visitante']['allow'] = array(
	'LandpageController' => array('landpage'),
	'LoginController' => array('login', 'erro', 'logout', 'info', 'habilitarjavascript', 'redirecionar'),
);
$acl['Visualizador']['allow'] = array(
	'LandpageController' => array('landpage'),
	'LoginController' => array('login', 'erro', 'logout', 'info', 'habilitarjavascript', 'redirecionar', 'dashboard'),
	'UsuarioController' => array('listar'),
	'ExpensesController' => array('listar'),
	'PlaceController' => array('listar'),
	'ReportController' => array('report'),
	'ScheduleController' => array('listarLocalDisponivels', 'listarAgedamentos', 'detalhes', 'listar'),
);
$acl['Administrador']['allow'] = '*';

$acl['Visitante']['failRoute'] = $acl['Administrador']['failRoute'] = $acl['Visualizador']['failRoute'] = array(
	'_default' => '/erro'
);
