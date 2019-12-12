<?php


    class RacaDAO
    {

        public function inserir(Raca $raca) {
            $qInserir = "INSERT INTO raca(desc_raca,id_tipo) VALUES (:desc_raca,:id_tipo)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":desc_raca",$raca->desc_raca);
            $comando->bindParam(":id_tipo",$raca->id_tipo);
            $comando->execute();
            $raca->id_raca = $pdo->lastInsertId();
            return $raca;
        }

        public function deletar($id_raca) {
            $qDeletar = "DELETE from raca WHERE id_raca=:id_raca";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id_raca",$id_raca);
            $comando->execute();
        }

        public function atualizar(Raca $raca) {
            $qAtualizar = "UPDATE raca SET desc_raca=:desc_raca, id_tipo=:id_tipo WHERE id_raca=:id_raca";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":desc_raca",$raca->desc_raca);
            $comando->bindParam(":id_tipo",$raca->id_tipo);
            $comando->bindParam(":id_raca",$raca->id_raca);
            $comando->execute();        
        }

        public function listar() {
		    $query = 'SELECT * FROM raca';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $raca=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $raca[] = new Raca($row->id_raca,$row->desc_raca,$row->id_tipo);
            }
            return $raca;
        }
        public function buscarPorId($id_raca) {
           $query = 'SELECT * FROM raca WHERE id_raca=:id_raca';		
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($query);
           $comando->bindParam (':id_raca', $id_raca);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           return new Raca($result->id_raca,$result->desc_raca,$result->id_tipo);
       }
       


       
    }
?>