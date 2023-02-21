<?php
//Login
$route['*']['/']                                         = array('LoginController', 'landpage');
$route['*']['/login']                                     = array('LoginController', 'login');
$route['*']['/info']                                     = array('LoginController', 'info');
$route['*']['/welcome']                                    = array('LoginController', 'welcome');
$route['*']['/acontecimento']                            = array('LoginController', 'welcome');
$route['*']['/logout']                                     = array('LoginController', 'logout');
$route['*']['/erro']                                     = array('LoginController', 'erro');
$route['*']['/habilitarjavascript']                     = array('LoginController', 'habilitarjavascript');
//Usuarios
$route['*']['/usuarios']                                 = array('UsuarioController', 'index');
$route['*']['/usuarios/cadastro']                         = array('UsuarioController', 'cadastro');
$route['*']['/usuarios/editar/:id']                     = array('UsuarioController', 'editar');
$route['*']['/usuarios/finalizar']                         = array('UsuarioController', 'finalizar');
$route['*']['/usuarios/remover/:id']                     = array('UsuarioController', 'remover');
$route['*']['/usuarios/desativacao/:id']                = array('UsuarioController', 'desativacao');
$route['*']['/usuarios/excluir']                         = array('UsuarioController', 'excluir');
$route['*']['/usuarios/ativacao/:id']                    = array('UsuarioController', 'ativacao');
$route['*']['/usuarios/listar']                            = array('UsuarioController', 'listar');
//Ajax
$route['*']['/verificarexistenciadeusuario']             = array('AjaxController', 'verificarexistenciadeusuario');
$route['*']['/carregardados']                             = array('AjaxController', 'carregardados');
