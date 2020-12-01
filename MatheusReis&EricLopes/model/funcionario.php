<?php
    require_once 'db.php';

    //Classe Funcionário

    class Funcionarios{
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

        //Função para realizar o registro de funcionários

        public function insert($nome_f, $cpf, $codigo_f){
            try{
                $sql = "INSERT INTO funcionarios(nome_f, cpf, codigo_f)
                VALUES (:nome_f, :cpf, :codigo_f)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome_f", $nome_f);
                $stmt->bindparam(":cpf", $cpf);
                $stmt->bindparam(":codigo_f", $codigo_f);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        //Função para atualizar/editar o registro de funcionários

        public function update($nome_f, $cpf, $codigo_f, $id_f){
            try{
                $sql = "UPDATE funcionarios 
                SET nome_f = :nome_f, cpf = :cpf, codigo_f = :codigo_f 
                WHERE id_f = :id_f";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome_f", $nome_f);
                $stmt->bindparam(":cpf", $cpf);
                $stmt->bindparam(":codigo_f", $codigo_f);
                $stmt->bindparam(":id_f", $id_f);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        //Função para deletar o registro de funcionários

        public function delete($id_f){
            try{
                $sql = "DELETE FROM funcionarios 
                WHERE id_f = :id_f";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":id_f", $id_f);
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