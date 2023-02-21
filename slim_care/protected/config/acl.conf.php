<?php	

//Permissões
$acl['Visitante']['allow'] = array(
		'LoginController'=>array('login','erro','logout','info','habilitarjavascript', 'redirecionar'),
);
$acl['Jogador']['allow'] = array(
		'LoginController'=>array('login','erro','logout','info','habilitarjavascript','welcome', 'redirecionar'),
		'AjaxController'=>array('verificarexistenciadeusuario','carregardados', 'excluiregistro', 'novidade'),
		'UsuarioController'=>array('editar','finalizar', 'desativacao')
);
$acl['Mestre']['allow'] = array(
		'LoginController'=>array('login','erro','logout','info','habilitarjavascript','welcome', 'redirecionar'),
		'AjaxController'=>array('verificarexistenciadeusuario','carregardados', 'excluiregistro', 'novidade'),
		'UsuarioController'=>array('index','finalizar','editar','ativacao','remover','excluir', 'listar'),
);

$acl['Master']['allow'] = '*';

$acl['Visitante']['failRoute'] =
$acl['Jogador']['failRoute']=
$acl['Mestre']['failRoute']=
$acl['Master']['failRoute'] = array(
		'_default'=>'/erro'
);
