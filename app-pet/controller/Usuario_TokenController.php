<?php

    class Usuario_TokenController{
        
     

        public function buscarPorId($request, $response, $args) {
            $id_token = (int) $args['id'];
            $dao = new Usuario_TokenDAO;    
            $token = $dao->buscarPorId($id_token);  
            $response = $response->withJson($token);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args) {
            $var = $request->getParsedBody();
            $token = new Token(0, $var['id'], $var['token']);
            $dao = new Usuario_TokenDAO;    
            $token = $dao->inserir($token);
            $response = $response->withJson($token);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
      

        public function deletar($request, $response, $args) {
            $id = (int) $args['id'];
            $dao = new Usuario_TokenDAO; 
            $token = $dao->buscarPorId($id);   
            $dao->deletar($id);
            $response = $response->withJson($token);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>