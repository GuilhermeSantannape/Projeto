<?php


    class EspecieDAO
    {

     

        public function listar() {
		    $query = 'SELECT * FROM tipo_animal';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $animais=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $animais[] = new Especie($row->id_tipo,$row->desc_tipo);
            }
            return $animais;
        }
        public function buscarPorId($id_tipo) {
           $query = 'SELECT * FROM tipo_animal WHERE id_tipo=:id_tipo';		
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($query);
           $comando->bindParam (':id_tipo', $id_tipo);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           return new Especie($result->id_tipo,$result->desc_tipo);
       }
     
    }
?>