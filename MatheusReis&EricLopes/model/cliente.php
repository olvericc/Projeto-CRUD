<?php
    require_once 'db.php';

    // Classe Cliente

    class Clientes{
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

        //Função para realizar o registro de clientes

        public function insert($nome_c, $idade, $sexo, $codigo_c){
            try{
                $sql = "INSERT INTO clientes(nome_c, idade, sexo, codigo_c) 
                VALUES (:nome_c, :idade, :sexo, :codigo_c)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome_c", $nome_c);
                $stmt->bindparam(":idade", $idade); //stmt -> une o php ao sql
                $stmt->bindparam(":sexo", $sexo);
                $stmt->bindparam(":codigo_c", $codigo_c);
                $stmt->execute();   //executar 
                return $stmt;   //retornar da camada controle para camada view
            }catch(PDOException $e){
                echo("Error".$e->getMessage());  
            }finally{
                $this->conn = null;
            }   
        }

        //Função para atualizar/editar o registro de clientes

        public function update($nome_c, $idade, $sexo, $codigo_c, $id_c){
            try{ 
                $sql = "UPDATE clientes 
                SET nome_c = :nome_c, idade = :idade, sexo = :sexo, codigo_c = :codigo_c 
                WHERE id_c = :id_c";    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome_c", $nome_c);
                $stmt->bindparam(":idade", $idade);
                $stmt->bindparam(":sexo", $sexo);
                $stmt->bindparam(":codigo_c", $codigo_c);
                $stmt->bindparam(":id_c", $id_c);
                $stmt->execute();
                return $stmt;   
            }catch(PDOException $e){
                echo("Error".$e->getMessage());
            }finally{
                $this->conn = null;
            }  
        }

        //Função para deletar o registro de clientes

        public function delete($id_c){
            try{
                $sql = "DELETE FROM clientes 
                WHERE id_c = :id_c";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":id_c", $id_c);
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
            header("Location: ".$url);  
        }
    }
?>