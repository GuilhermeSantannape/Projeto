<?php

    class ClienteController{
        
        public function listar($request, $response,$args) {
            $dao = new ClienteDAO;    
            $array_clientes = $dao->listar();            
            $response = $response->withJson($array_clientes);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args) {
            $id_cliente = (int) $args['id'];
            $dao = new ClienteDAO;    
            $cliente = $dao->buscarPorId($id_cliente);  
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args) {
            $var = $request->getParsedBody();
            $cliente = new Cliente(0, $var['nome'], $var['cpf'], $var['sexo'], $var['email'], $var['endereco'], $var['numero'], $var['complemente']);
            $dao = new ClienteDAO;    
            $cliente = $dao->inserir($cliente);
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        
        public function atualizar($request, $response, $args) {
            $id_cliente = (int) $args['id'];
            $var = $request->getParsedBody();
            $cliente = new Cliente($id_cliente, $var['nome'], $var['cpf'], $var['sexo'], $var['email'], $var['endereco'], $var['numero'], $var['complemente']);
            $dao = new ClienteDAO;    
            $dao->atualizar($cliente);
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }

        public function deletar($request, $response, $args) {
            $id_cliente = (int) $args['id'];
            $dao = new ClienteDAO; 
            $cliente = $dao->buscarPorId($id_cliente);   
            $dao->deletar($id_cliente);
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>