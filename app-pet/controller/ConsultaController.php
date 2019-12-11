<?php

    class ConsultaController{
        
        public function listar($request, $response,$args) {
            $dao = new ConsultaDAO;    
            $array_consulta = $dao->listar();            
            $response = $response->withJson($array_consulta);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args) {
            $id_consulta = (int) $args['id'];
            $dao = new ConsultaDAO;    
            $consulta = $dao->buscarPorId($id_consulta);  
            $response = $response->withJson($consulta);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args) {
            $var = $request->getParsedBody();
            $consulta = new Consulta(0, $var['dta_consult'], $var['id_pessoa'], $var['status'], $var['hr_consulta'], $var['id_animal']);
            $dao = new ConsultaDAO;    
            $consulta = $dao->inserir($consulta);
            $response = $response->withJson($consulta);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        
        public function atualizar($request, $response, $args) {
            $id_consulta = (int) $args['id'];
            $var = $request->getParsedBody();
            $consulta = new Consulta(0, $var['dta_consult'], $var['id_pessoa'], $var['status'], $var['hr_consulta'], $var['id_animal']);
            $dao = new ConsultaDAO;    
            $dao->atualizar($consulta);
            $response = $response->withJson($consulta);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }

        public function deletar($request, $response, $args) {
            $id_consulta = (int) $args['id'];
            $dao = new ConsultaDAO; 
            $consulta = $dao->buscarPorId($id_consulta);   
            $dao->deletar($id_consulta);
            $response = $response->withJson($consulta);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>