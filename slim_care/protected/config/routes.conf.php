<?php
//Login
$route['*']['/']                                         = array('LoginController', 'landpage');
$route['*']['/admin']                                     = array('LoginController', 'login');
$route['*']['/dashboard']                                    = array('LoginController', 'dashboard');
$route['*']['/logout']                                     = array('LoginController', 'logout');
$route['*']['/erro']                                     = array('LoginController', 'erro');
$route['*']['/habilitarjavascript']                     = array('LoginController', 'habilitarjavascript');
//Usuarios
$route['*']['/usuarios']                                 = array('UsuarioController', 'listar');
$route['*']['/usuarios/cadastro']                         = array('UsuarioController', 'cadastro');
$route['*']['/usuarios/editar/:id']                     = array('UsuarioController', 'editar');
$route['*']['/usuarios/finalizar']                         = array('UsuarioController', 'finalizar');
$route['*']['/usuarios/remover/:id']                     = array('UsuarioController', 'remover');
$route['*']['/usuarios/desativacao/:id']                = array('UsuarioController', 'desativacao');
$route['*']['/usuarios/excluir']                         = array('UsuarioController', 'excluir');
$route['*']['/usuarios/ativacao/:id']                    = array('UsuarioController', 'ativacao');
$route['*']['/usuarios/listar']                            = array('UsuarioController', 'listar');

//Locais
$route['*']['/locais']                                 = array('PlaceController', 'listar');
$route['*']['/locais/cadastro']                         = array('PlaceController', 'cadastro');
$route['*']['/locais/editar/:id']                     = array('PlaceController', 'editar');
$route['*']['/locais/finalizar']                         = array('PlaceController', 'finalizar');
$route['*']['/locais/remover/:id']                     = array('PlaceController', 'remover');
$route['*']['/locais/desativacao/:id']                = array('PlaceController', 'desativacao');
$route['*']['/locais/excluir']                         = array('PlaceController', 'excluir');
$route['*']['/locais/ativacao/:id']                    = array('PlaceController', 'ativacao');
$route['*']['/locais/listar']                            = array('PlaceController', 'listar');

//Ajax
$route['*']['/verificarexistenciadeusuario']             = array('AjaxController', 'verificarexistenciadeusuario');
$route['*']['/carregardados']                             = array('AjaxController', 'carregardados');
