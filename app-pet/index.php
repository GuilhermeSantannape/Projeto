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
->add('UsuarioController:validarToken');

$app->run();
?>