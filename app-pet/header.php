<?php
// include para criação de conexão com banco de dados
require_once "db/PDOFactory.php";

// includes de class
require_once 'class/Produto.php';
require_once 'class/Usuario.php';
require_once 'class/Animal.php';
require_once 'class/Raca.php';
require_once 'class/Especie.php';
require_once 'class/Cliente.php';
require_once 'class/Consulta.php';

// include de DAO
include_once 'dao/ProdutoDAO.php';
include_once 'dao/UsuarioDAO.php';
include_once 'dao/AnimalDAO.php';
include_once 'dao/RacaDAO.php';
require_once 'dao/EspecieDAO.php';
require_once 'dao/ClienteDAO.php';
require_once 'dao/ConsultaDAO.php';

// includes de controllers
require_once 'controller/ProdutoController.php';
require_once 'controller/UsuarioController.php';
require_once 'controller/AnimalController.php';
require_once 'controller/RacaController.php';
require_once 'controller/EspecieController.php';
require_once 'controller/ClienteController.php';
require_once 'controller/ConsultaController.php';

// include de autoload do Slim
require "vendor/autoload.php";

// configuração do Slim para exibição dos detalhes na ocorrência de erros
$config = [
	'settings'             => [
		'displayErrorDetails' => true
	],
];
?>