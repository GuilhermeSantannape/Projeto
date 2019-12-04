<?php


    class Usuario_TokenDAO
    {

        public function inserir(Token $token) {
            $qInserir = "INSERT INTO usuarios_token(id,token) VALUES (:id,:token)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":id",$token->id);
            $comando->bindParam(":token",$token->token);
            $comando->execute();
             return $token;
        }

        public function deletar($id) {
            $qDeletar = "DELETE from usuarios_token WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
        }

        public function buscarPorId($id) {
           $query = 'SELECT * FROM usuarios_token WHERE id=:id';		
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($query);
           $comando->bindParam (':id', $id);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           return new Token($result->id,$result->token);
       }
    }
?>