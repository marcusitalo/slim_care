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
//Ajax
$route['*']['/verificarexistenciadeusuario']             = array('AjaxController', 'verificarexistenciadeusuario');
$route['*']['/carregardados']                             = array('AjaxController', 'carregardados');
