<?php


    class ClienteDAO
    {
        public function deletar($id_pessoa) {
            $qDeletar = "DELETE from pessoa WHERE id_pessoa=:id_pessoa";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id_pessoa",$id_pessoa);
            $comando->execute();
        }

        public function atualizar(Pessoa $cliente) {
            $qAtualizar = "UPDATE pessoa SET nome=:nome, cpf=:cpf, sexo=:sexo,  WHERE id_pessoa=:id_pessoa";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":nome",$cliente->nome);
            $comando->bindParam(":cpf",$cliente->cpf);
            $comando->bindParam(":sexo",$cliente->sexo);
            $comando->execute();        
        }

        public function listar() {
		    $query = 'SELECT * FROM pessoa';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $cliente=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $cliente[] = new Cliente($row->id_pessoa,$row->nome,$row->cpf,$row->sexo);
            }
            return $cliente;
        }
        public function buscarPorId($id_pessoa) {
           $query = 'SELECT * FROM pessoa WHERE id_pessoa=:id_pessoa';		
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($query);
           $comando->bindParam (':id_pessoa', $id_pessoa);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           return new Cliente($row->id_pessoa, $row->nome,$row->cpf,$row->sexo);
       }
       public function inserir(Cliente $cliente) {
        $qInserir = "INSERT INTO pessoa(nome,cpf,sexo) VALUES (:nome,:cpf,:sexo)";
        $qGet = "SELECT * FROM pessoa WHERE cpf='$cpf'";         
        $pdo = PDOFactory::getConexao();
        $comando = $pdo->prepare($qInserir);
        $comandoGet = $pdo->prepare($qGet);
        $numeros = mysql_num_rows ($query);
        if ($numeros>"0"){
            echo "Tem uma informação cadastrada!";   //Sucesso
        }
        else{
            echo "Não tem nenhuma informação cadastrada!"; //Erro
        }
        $comando->bindParam(":nome",$cliente->nome);
        $comando->bindParam(":cpf",$cliente->cpf);
        $comando->bindParam(":sexo",$cliente->sexo);
        $comando->execute();
        $cliente->id_pessoa = $pdo->lastInsertId();
        return $pessoa;
        }
    }
?>