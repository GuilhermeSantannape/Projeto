<?php

require_once './class/Produto.php';
require_once './dao/ProdutoDAO.php';
require "./vendor/autoload.php";

    class ProdutoController{
        
        public function listar($request, $response,$args) {
            $dao = new ProdutoDAO;    
            $array_produtos = $dao->listar();            
            $response = $response->withJson($array_produtos);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args) {
            $id = (int) $args['id'];
            $dao = new ProdutoDAO;    
            $produto = $dao->buscarPorId($id);  
            $response = $response->withJson($produto);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args) {
            $var = $request->getParsedBody();
            $produto = new Produto(0, $var['nome'], $var['imagem'], $var['descricao'], $var['uso']);
            $dao = new ProdutoDAO;    
            $produto = $dao->inserir($produto);
            $response = $response->withJson($produto);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        
        public function atualizar($request, $response, $args) {
            $id = (int) $args['id'];
            $var = $request->getParsedBody();
            $produto = new Produto($id, $var['nome'], $var['imagem'], $var['descricao'], $var['uso']);
            $dao = new ProdutoDAO;    
            $dao->atualizar($produto);
            $response = $response->withJson($produto);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }

        public function deletar($request, $response, $args) {
            $id = (int) $args['id'];
            $dao = new ProdutoDAO; 
            $produto = $dao->buscarPorId($id);   
            $dao->deletar($id);
            $response = $response->withJson($produto);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>