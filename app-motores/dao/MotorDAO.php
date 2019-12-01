<?php

    class ProdutoDAO
    {

        public function inserir(Produto $produto) {
            $qInserir = "INSERT INTO produtos(nome,imagem,descricao,uso) VALUES (:nome,:imagem,:descricao,:uso)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":nome",$produto->nome);
            $comando->bindParam(":imagem",$produto->imagem);
            $comando->bindParam(":descricao",$produto->descricao);
            $comando->bindParam(":uso",$produto->uso);
            $comando->execute();
            $produto->id = $pdo->lastInsertId();
            return $produto;
        }

        public function deletar($id) {
            $qDeletar = "DELETE from produtos WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
        }

        public function atualizar(Produto $produto) {
            $qAtualizar = "UPDATE produtos SET nome=:nome, imagem=:imagem, descricao=:descricao, uso=:uso WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":nome",$produtoproduto->nome);
            $comando->bindParam(":imagem",$produto->imagem);
            $comando->bindParam(":descricao",$produto->descricao);
            $comando->bindParam(":uso",$produto->uso);
            $comando->bindParam(":id",$produto->id);
            $comando->execute();        
        }

        public function listar() {
		    $query = 'SELECT * FROM produtos';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $produtos=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $produtos[] = new Produto($row->id,$row->nome,$row->imagem,$row->descricao,$row->uso);
            }
            return $produtos;
        }

        public function buscarPorId($id) {
 		    $query = 'SELECT * FROM produtos WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
            return new Produto($result->id,$result->nome,$result->imagem,$result->descricao,$result->uso);
        }
    }
?>