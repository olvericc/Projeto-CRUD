<?php
    require_once 'db.php';

    //Classe Produto

    class Produtos{
        private $conn;
        
        //Função Construtor

        public function __construct(){
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }

        //Função Preparar

        public function runQuery($sql){
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        //Função para realizar o registro de produtos

        public function insert($descricao, $quantidade, $preco, $codigo_p){
            try{
                $sql = "INSERT INTO produtos(descricao, quantidade, preco, codigo_p)
                VALUES (:descricao, :quantidade, :preco, :codigo_p)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":descricao", $descricao);
                $stmt->bindparam(":quantidade", $quantidade);
                $stmt->bindparam(":preco", $preco);
                $stmt->bindparam(":codigo_p", $codigo_p);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        //Função para atualizar/editar o registro de produtos

        public function update($descricao, $quantidade, $preco, $codigo_p, $id_p){
            try{
                $sql = "UPDATE produtos 
                SET descricao = :descricao, quantidade = :quantidade, preco = :preco, codigo_p = :codigo_p 
                WHERE id_p = :id_p";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":descricao", $descricao);
                $stmt->bindparam(":quantidade", $quantidade);
                $stmt->bindparam(":preco", $preco);
                $stmt->bindparam(":codigo_p", $codigo_p);
                $stmt->bindparam(":id_p", $id_p);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        //Função para deletar o registro de funcionários

        public function delete($id_p){
            try{
                $sql = "DELETE FROM produtos
                WHERE id_p = :id_p";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":id_p", $id_p);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        //Função Redirecionar

        public function redirect($url){
            header("Location: $url");
        }
    }
?>