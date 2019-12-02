<?php

    class RacaController{
        
        public function listar($request, $response,$args) {
            $dao = new RacaDAO;    
            $array_raca = $dao->listar();            
            $response = $response->withJson($array_raca);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args) {
            $id_raca = (int) $args['id'];
            $dao = new RacaDAO;    
            $raca = $dao->buscarPorId($id_raca);  
            $response = $response->withJson($raca);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args) {
            $var = $request->getParsedBody();
            $raca = new Raca(0, $var['desc_raca'], $var['id_tipo']);
            $dao = new RacaDAO;    
            $raca = $dao->inserir($raca);
            $response = $response->withJson($raca);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        
        public function atualizar($request, $response, $args) {
            $id_raca = (int) $args['id'];
            $var = $request->getParsedBody();
            $raca = new Raca($id_raca, $var['desc_raca'], $var['id_tipo']);
            $dao = new RacaDAO;    
            $dao->atualizar($raca);
            $response = $response->withJson($raca);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }

        public function deletar($request, $response, $args) {
            $id_raca = (int) $args['id'];
            $dao = new RacaDAO; 
            $raca = $dao->buscarPorId($id_raca);   
            $dao->deletar($id_raca);
            $response = $response->withJson($raca);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>