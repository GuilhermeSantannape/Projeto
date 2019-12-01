<?php

    class AnimalDAO
    {

        public function inserir(Animal $animal) {
            $qInserir = "INSERT INTO animal(desc_animal,id_raca,dta_nasc,sexo) VALUES (:desc_animal,:id_raca,:dta_nasc,:sexo)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":desc_animal",$animal->desc_animal);
            $comando->bindParam(":id_raca",$animal->id_raca);
            $comando->bindParam(":dta_nasc",$animal->dta_nasc);
            $comando->bindParam(":sexo",$animal->sexo);
            $comando->execute();
            $animal->id = $pdo->lastInsertId();
            return $animal;
        }

        public function deletar($id) {
            $qDeletar = "DELETE from animal WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
        }

        public function atualizar(Animal $animal) {
            $qAtualizar = "UPDATE animal SET desc_animal=:desc_animal, id_raca=:id_raca, dta_nasc=:dta_nasc, sexo=:sexo WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":desc_animal",$animal->desc_animal);
            $comando->bindParam(":id_raca",$animal->id_raca);
            $comando->bindParam(":dta_nasc",$animal->dta_nasc);
            $comando->bindParam(":sexo",$animal->sexo);
            $comando->bindParam(":id",$animal->id);
            $comando->execute();        
        }

        public function listar() {
		    $query = 'SELECT * FROM animal';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $animais=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $animais[] = new Animal($row->id,$row->desc_animal,$row->id_raca,$row->dta_nasc,$row->sexo);
            }
            return $animais;
        }

        public function buscarPorId($id) {
 		    $query = 'SELECT * FROM animal WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
            return new Animal($result->id,$result->desc_animal,$result->id_raca,$result->dta_nasc,$result->sexo);
        }
    }
?>