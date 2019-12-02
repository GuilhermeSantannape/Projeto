<?php
// include para criação de conexão com banco de dados
require_once "db/PDOFactory.php";

// includes de class
require_once 'class/Produto.php';
require_once 'class/Usuario.php';
require_once 'class/Animal.php';
require_once 'class/Raca.php';

// include de DAO
include_once 'dao/ProdutoDAO.php';
include_once 'dao/UsuarioDAO.php';
include_once 'dao/AnimalDAO.php';
include_once 'dao/RacaDAO.php';

// includes de controllers
require_once 'controller/ProdutoController.php';
require_once 'controller/UsuarioController.php';
require_once 'controller/AnimalController.php';
require_once 'controller/RacaController.php';

// include de autoload do Slim
require "vendor/autoload.php";

// configuração do Slim para exibição dos detalhes na ocorrência de erros
$config = [
	'settings'             => [
		'displayErrorDetails' => true
	],
];
?>