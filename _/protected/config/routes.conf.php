<?php
$route['*']['/']                                               = array('LandpageController', 'landpage');
//Login
$route['*']['/admin']                                          = array('LoginController', 'login');
$route['*']['/admin/dashboard']                                = array('LoginController', 'dashboard');
$route['*']['/admin/logout']                                   = array('LoginController', 'logout');
$route['*']['/erro']                                           = array('LoginController', 'erro');
$route['*']['/habilitarjavascript']                            = array('LoginController', 'habilitarjavascript');
//Usuarios
$route['*']['/admin/usuarios']                                 = array('UsuarioController', 'listar');
$route['*']['/admin/usuarios/cadastro']                        = array('UsuarioController', 'cadastro');
$route['*']['/admin/usuarios/editar/:id']                      = array('UsuarioController', 'editar');
$route['*']['/admin/usuarios/finalizar']                       = array('UsuarioController', 'finalizar');
$route['*']['/admin/usuarios/remover/:id']                     = array('UsuarioController', 'remover');
$route['*']['/admin/usuarios/desativacao/:id']                 = array('UsuarioController', 'desativacao');
$route['*']['/admin/usuarios/excluir']                         = array('UsuarioController', 'excluir');
$route['*']['/admin/usuarios/ativacao/:id']                    = array('UsuarioController', 'ativacao');
$route['*']['/admin/usuarios/listar']                          = array('UsuarioController', 'listar');

//Locais
$route['*']['/admin/locais']                                 = array('PlaceController', 'listar');
$route['*']['/admin/locais/cadastro']                        = array('PlaceController', 'cadastro');
$route['*']['/admin/locais/editar/:id']                      = array('PlaceController', 'editar');
$route['*']['/admin/locais/finalizar']                       = array('PlaceController', 'finalizar');
$route['*']['/admin/locais/remover/:id']                     = array('PlaceController', 'remover');
$route['*']['/admin/locais/desativacao/:id']                 = array('PlaceController', 'desativacao');
$route['*']['/admin/locais/excluir']                         = array('PlaceController', 'excluir');
$route['*']['/admin/locais/ativacao/:id']                    = array('PlaceController', 'ativacao');
$route['*']['/admin/locais/listar']                          = array('PlaceController', 'listar');

//Agenda
$route['*']['/admin/agenda']                                 = array('ScheduleController', 'listarAgedamentos');
$route['*']['/admin/agenda/disponivel']                      = array('ScheduleController', 'listarLocalDisponivels');
$route['*']['/admin/agenda/local/:place_id/:dti/:dtf']       = array('ScheduleController', 'cadastro');
$route['*']['/admin/agenda/local/:schedule_id/show']         = array('ScheduleController', 'detalhes');
$route['*']['/admin/agenda/editar/:id']                      = array('ScheduleController', 'editar');
$route['*']['/admin/agenda/finalizar']                       = array('ScheduleController', 'finalizar');
$route['*']['/admin/agenda/remover/:id']                     = array('ScheduleController', 'remover');
$route['*']['/admin/agenda/desativacao/:id']                 = array('ScheduleController', 'desativacao');
$route['*']['/admin/agenda/excluir']                         = array('ScheduleController', 'excluir');
$route['*']['/admin/agenda/ativacao/:id']                    = array('ScheduleController', 'ativacao');
$route['*']['/admin/agenda/listar']                          = array('ScheduleController', 'listar');
//Despesas
$route['*']['/admin/despesas/cadastro']                    = array('ExpensesController', 'cadastro');
$route['*']['/admin/despesas/editar/:day_expenses']        = array('ExpensesController', 'editar');
$route['*']['/admin/despesas']                             = array('ExpensesController', 'listar');
$route['*']['/admin/despesas/finalizar']                   = array('ExpensesController', 'finalizar');
$route['*']['/admin/despesas/remover/:day_expenses']       = array('ExpensesController', 'remover');
$route['*']['/admin/despesas/excluir']                     = array('ExpensesController', 'excluir');
$route['*']['/admin/despesas/listar']                      = array('ExpensesController', 'listar');

$route['*']['/admin/relatorios']                           = array('ReportController', 'report');


//Ajax
$route['*']['/verificarexistenciadeusuario']           = array('AjaxController', 'verificarexistenciadeusuario');
$route['*']['/carregardados']                          = array('AjaxController', 'carregardados');
