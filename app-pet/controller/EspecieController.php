<?php

    class EspecieController{
        
        public function listar($request, $response,$args) {
            $dao = new EspecieDAO;    
            $array_animals = $dao->listar();            
            $response = $response->withJson($array_animals);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args) {
            $id_especie = (int) $args['id'];
            $dao = new EspecieDAO;    
            $especie = $dao->buscarPorId($id_especie);  
            $response = $response->withJson($especie);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        
    }

?>