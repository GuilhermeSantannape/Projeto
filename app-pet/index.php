<?php
// inclui o cabeçalho com requires e configs

require_once "header.php";

$app = new \Slim\App($config);

// criação de rota de autenticação para geração de token
$app->post("/api/auth", "UsuarioController:autenticar");

$app->group('/api/produtos', function(){
    $this->get('','ProdutoController:listar');
    $this->post('','ProdutoController:inserir');
    $this->get('/{id:[0-9]+}','ProdutoController:buscarPorId');
    $this->put('/{id:[0-9]+}','ProdutoController:atualizar');
    $this->delete('/{id:[0-9]+}','ProdutoController:deletar');
})
;

$app->group('/api/animais', function(){
    $this->get('','AnimalController:listar');
    $this->post('','AnimalController:inserir');
    $this->get('/{id:[0-9]+}','AnimalController:buscarPorId');
    $this->put('/{id:[0-9]+}','AnimalController:atualizar');
    $this->delete('/{id:[0-9]+}','AnimalController:deletar');
})
;

$app->group('/api/raca', function(){
    $this->get('','RacaController:listar');
    $this->post('','RacaController:inserir');
    $this->get('/{id:[0-9]+}','RacaController:buscarPorId');
    $this->put('/{id:[0-9]+}','RacaController:atualizar');
    $this->delete('/{id:[0-9]+}','RacaController:deletar');
})
;

$app->group('/api/especie', function(){
    $this->get('','EspecieController:listar');
    $this->get('/{id:[0-9]+}','EspecieController:buscarPorId');
 
})
;

$app->group('/api/cliente', function(){
    $this->get('','ClienteController:listar');
    $this->post('','ClienteController:inserir');
    $this->get('/{id:[0-9]+}','ClienteController:buscarPorId');
    $this->put('/{id:[0-9]+}','ClienteController:atualizar');
    $this->delete('/{id:[0-9]+}','ClienteController:deletar');
})
;

$app->group('/api/usuario_token', function(){
    
    $this->post('','Usuario_tokenController:inserir');
    $this->get('/{id:[0-9]+}','Usuario_tokenController:buscarPorId');
    $this->delete('/{id:[0-9]+}','Usuario_tokenController:deletar');
})
;


$app->run();
?>