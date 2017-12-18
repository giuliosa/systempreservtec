<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rotas de validação e Login
$route['systempreserv/validar'] = 'login/validar';
$route['systempreserv/login'] = 'login';

// Rotas do formulário
$route['formularios/(:num)'] = 'formularios/detalheform/$1';
$route['formularios/excluir/(:num)'] = 'formularios/excluir/$1';

// Rotas do Reembolso
$route['reembolso/(:num)'] = 'reembolso/detalheReembolso/$1';
$route['reembolso/(:num)/(:any)'] = 'reembolso/detalheReembolsoPorFuncionario/$1/$2';

// Rotas dos Funcionarios
$route['funcionarios/(:num)/(:any)'] = 'funcionarios/detalheFuncionario/$1/$2';
$route['funcionarios/excluir/(:any)'] = 'funcionarios/excluir/$1';

// Rotas do relatório
$route['relatorio/(:num)'] = 'relatorios/detalheRelatorio/$1';
$route['relatorio/(:num)/relatorios/(:num)'] = 'relatorios/editarRelatorio/$2';
$route['relatorio/(:num)/relatorios/excluir/(:num)'] = 'relatorios/excluirRelatorio/$2';
$route['relatorio/(:num)/(:any)'] = 'relatorios/detalheRelatorioPorFuncionario/$1/$2';
$route['relatorio/(:num)/(:any)/detalherelatorio/(:num)/(:num)'] = 'relatorios/detalheRelatorios/$3/$4';


// Rotas para o financeiro e RH
$route['downloadArquivo/(:num)'] = 'financeiro/downloadArquivo/$1';
$route['financeiro/excluir/(:any)'] = 'financeiro/excluir/$1';