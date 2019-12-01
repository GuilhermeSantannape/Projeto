<?php
// include para criação de conexão com banco de dados
require_once "db/PDOFactory.php";

// includes de class
require_once 'class/Produto.php';
require_once 'class/Usuario.php';

// include de DAO
include_once 'dao/ProdutoDAO.php';
include_once 'dao/UsuarioDAO.php';

// includes de controllers
require_once 'controller/ProdutoController.php';
require_once 'controller/UsuarioController.php';

// include de autoload do Slim
require "vendor/autoload.php";

// configuração do Slim para exibição dos detalhes na ocorrência de erros
$config = [
	'settings'             => [
		'displayErrorDetails' => true
	],
];
?>