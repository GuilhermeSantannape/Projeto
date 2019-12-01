<?php

    class AnimalController{
        
        public function listar($request, $response,$args) {
            $dao = new AnimalDAO;    
            $array_animals = $dao->listar();            
            $response = $response->withJson($array_animals);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args) {
            $id = (int) $args['id'];
            $dao = new AnimalDAO;    
            $animal = $dao->buscarPorId($id);  
            $response = $response->withJson($animal);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args) {
            $var = $request->getParsedBody();
            $animal = new Animal(0, $var['desc_animal'], $var['id_raca'], $var['dta_nasc'], $var['sexo']);
            $dao = new AnimalDAO;    
            $animal = $dao->inserir($animal);
            $response = $response->withJson($animal);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        
        public function atualizar($request, $response, $args) {
            $id = (int) $args['id'];
            $var = $request->getParsedBody();
            $animal = new Animal($id, $var['desc_animal'], $var['id_raca'], $var['dta_nasc'], $var['sexo']);
            $dao = new AnimalDAO;    
            $dao->atualizar($animal);
            $response = $response->withJson($animal);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }

        public function deletar($request, $response, $args) {
            $id = (int) $args['id'];
            $dao = new AnimalDAO; 
            $animal = $dao->buscarPorId($id);   
            $dao->deletar($id);
            $response = $response->withJson($animal);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>