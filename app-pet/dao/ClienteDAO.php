<?php


    class ClienteDAO
    {

        public function inserir(Cliente $cliente) {
            $dao = new ClienteDAO;
            $qInserir = "INSERT INTO cliente(nome,cpf,sexo,email,endereco,numero,complemente) VALUES (:nome,:cpf,:sexo,:email,:endereco,:numero,:complemente)";
              
            $qGet = "SELECT * FROM cliente WHERE cpf=:cpf";                
            $pdo = PDOFactory::getConexao();
            $query = mysqli_query($pdo, $qGet); 
            $comando = $pdo->prepare($qInserir);
            //$clientes = $dao->listar();
            //$numeros = sizeof($clientes);
            $numeros = mysqli_num_rows($query);
            if ($numeros>0){
                echo "Ja existe esse cliente!";   //Nao pode inserir
                //return $resp->withStatus(401);
            }
            else{
                echo "Nao existe, pode criar o cliente!"; //Pode inserir
                $comando->bindParam(":nome",$cliente->nome);
                $comando->bindParam(":cpf",$cliente->cpf);
                $comando->bindParam(":sexo",$cliente->sexo);
                $comando->bindParam(":email",$cliente->email);
                $comando->bindParam(":endereco",$cliente->endereco);
                $comando->bindParam(":numero",$cliente->numero);
                $comando->bindParam(":complemente",$cliente->complemente);
                $comando->execute();
                $cliente->id_cliente = $pdo->lastInsertId();
                return $cliente;
            }
            
        }

        public function deletar($id_cliente) {
            $qDeletar = "DELETE from cliente WHERE id_cliente=:id_cliente";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id_cliente",$id_cliente);
            $comando->execute();
        }

        public function atualizar(Cliente $cliente) {
            $qAtualizar = "UPDATE cliente SET nome=:nome, cpf=:cpf, sexo=:sexo,email=:email,endereco=:endereco,numero=:numero,complemente=:complemente
             WHERE id_cliente=:id_cliente";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":nome",$cliente->nome);
            $comando->bindParam(":cpf",$cliente->cpf);
            $comando->bindParam(":sexo",$cliente->sexo);
            $comando->bindParam(":email",$cliente->email);
            $comando->bindParam(":endereco",$cliente->endereco);
            $comando->bindParam(":numero",$cliente->numero);
            $comando->bindParam(":complemente",$cliente->complemente);
            $comando->bindParam(":id_cliente",$cliente->id_cliente);
            $comando->execute();        
        }

        public function listar() {
		    $query = 'SELECT * FROM cliente';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $clientes=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $clientes[] = new Cliente($row->id_cliente,$row->nome,$row->cpf,$row->sexo,$row->email,$row->endereco,$row->numero,$row->complemente);
            }
            return $clientes;
        }

        public function listarPorCpf($cpf) {
            $query = 'SELECT * FROM cliente WHERE cpf=:cpf';
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($query);
            $comando->execute();
            $clientes=array();  
            while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $clientes[] = new Cliente($row->id_cliente,$row->nome,$row->cpf,$row->sexo,$row->email,$row->endereco,$row->numero,$row->complemente);
            }
            return $clientes;
        }

        public function buscarPorId($id_cliente) {
           $query = 'SELECT * FROM cliente WHERE id_cliente=:id_cliente';		
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($query);
           $comando->bindParam (':id_cliente', $id_cliente);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           return new Cliente($result->id_cliente,$result->nome,$result->cpf,$result->sexo,$result->email,$result->endereco,$result->numero,$result->complemente);
       }
    }
?>