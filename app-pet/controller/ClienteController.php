<?php

    class ClienteController{
        
        public function listar($request, $response,$args) {
            $dao = new ClienteDAO;    
            $array_pessoas = $dao->listar();            
            $response = $response->withJson($array_pessoas);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args) {
            $id_pessoa = (int) $args['id'];
            $dao = new ClientelDAO;    
            $pessoa = $dao->buscarPorId($id_pessoa);  
            $response = $response->withJson($pessoa);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args) {
            $var = $request->getParsedBody();
            $pessoa = new Cliente(0, $var['nome'], $var['cpf'], $var['sexo']);
            $dao = new ClienteDAO;    
            $pessoa = $dao->inserir($pessoa);
            $response = $response->withJson($pessoa);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        
        public function atualizar($request, $response, $args) {
            $id_pessoa = (int) $args['id'];
            $var = $request->getParsedBody();
            $pessoa = new Cliente($id_pessoa, $var['nome'], $var['cpf'], $var['sexo']);
            $dao = new ClienteDAO;    
            $dao->atualizar($pessoa);
            $response = $response->withJson($pessoa);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }

        public function deletar($request, $response, $args) {
            $id_pessoa = (int) $args['id'];
            $dao = new ClienteDAO; 
            $pessoa = $dao->buscarPorId($id_pessoa);   
            $dao->deletar($id_pessoa);
            $response = $response->withJson($pessoa);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>