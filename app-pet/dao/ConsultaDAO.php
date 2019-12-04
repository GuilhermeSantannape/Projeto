<?php


    class ConsultaDAO
    {
        public function inserir(Consulta $consulta) {
            $qInserir = "INSERT INTO consulta(dta_consult,id_pessoa,status,hr_consulta, id_animal) VALUES (:dta_consult,:id_pessoa,:status,:hr_consulta, :id_animal)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":dta_consult",$consulta->dta_consult);
            $comando->bindParam(":id_pessoa",$consulta->id_pessoa);
            $comando->bindParam(":status",$consulta->status);
            $comando->bindParam(":hr_consulta",$consulta->hr_consulta);
            $comando->bindParam(":id_animal",$consulta->id_animal);
            $comando->execute();
            $consulta->id_consulta = $pdo->lastInsertId();
            return $consulta;
        }

        public function deletar($id_consulta) {
            $qDeletar = "DELETE from consulta WHERE id_consulta=:id_consulta";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id_consulta",$id_consulta);
            $comando->execute();
        }

        public function atualizar(Consulta $consulta) {
            $qAtualizar = "UPDATE consulta SET dta_consult=:dta_consult, id_pessoa=:id_pessoa, status=:status, hr_consulta=:hr_consulta, id_animal=:id_animal WHERE id_consulta=:id_consulta";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":dta_consult",$consulta->dta_consult);
            $comando->bindParam(":id_pessoa",$consulta->id_pessoa);
            $comando->bindParam(":status",$consulta->status);
            $comando->bindParam(":hr_consulta",$consulta->hr_consulta);
            $comando->bindParam(":id_animal",$consulta->id_animal);
            $comando->bindParam(":id_consulta",$consulta->id_consulta);
            $comando->execute();        
        }

        public function listar() {
		    $query = 'SELECT * FROM consulta';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $consulta=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $consulta[] = new Consulta($row->id_consulta,$row->dta_consult,$row->id_pessoa,$row->status,$row->hr_consulta,$row->id_animal);
            }
            return $consulta;
        }
        public function buscarPorId($id_consulta) {
           $query = 'SELECT * FROM consulta WHERE id_consulta=:id_consulta';		
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($query);
           $comando->bindParam (':id_consulta', $id_consulta);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           return new Consulta($row->id_consulta,$row->dta_consult,$row->id_pessoa,$row->status,$row->hr_consulta,$row->id_animal);
       }

       public function buscarPorData($dta_consult) {
           $query = 'SELECT * FROM consulta WHERE dta_consult=:dta_consult';        
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($query);
           $comando->bindParam (':dta_consult', $dta_consult);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           return new Consulta($row->id_consulta,$row->dta_consult,$row->id_pessoa,$row->status,$row->hr_consulta,$row->id_animal);
       }
    }
?>