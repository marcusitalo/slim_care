<?php
$acl['Visitante']['allow'] = array(
	'LandpageController' => array('landpage'),
	'LoginController' => array('login', 'erro', 'logout', 'info', 'habilitarjavascript', 'redirecionar'),
);
$acl['Administrador']['allow'] = '*';

$acl['Visitante']['failRoute'] = $acl['Administrador']['failRoute'] = array(
	'_default' => '/erro'
);
