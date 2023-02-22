<?php

//Permissões
$acl['Visitante']['allow'] = array(
	'LoginController' => array('login', 'erro', 'logout', 'info', 'habilitarjavascript', 'redirecionar'),
);
$acl['Jogador']['allow'] = array(
	'LoginController' => array('login', 'erro', 'logout', 'info', 'habilitarjavascript', 'welcome', 'redirecionar'),
	'AjaxController' => array('verificarexistenciadeusuario', 'carregardados', 'excluiregistro', 'novidade'),
	'UsuarioController' => array('editar', 'finalizar', 'desativacao')
);
$acl['Master']['allow'] = '*';
$acl['Administrador']['allow'] = '*';

$acl['Visitante']['failRoute'] =
	$acl['Jogador']['failRoute'] =
	$acl['Mestre']['failRoute'] =
	$acl['Administrador']['failRoute'] = array(
		'_default' => '/erro'
	);
