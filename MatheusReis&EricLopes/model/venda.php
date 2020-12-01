<?php
    require_once 'db.php';

    //Classe Vendas

    class Vendas{
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

        //Função para realizar registro de venda

        public function insert($nome_cliente, $nome_funcionario, $bike_descricao, $bike_quantidade, $bike_preco){
            try{    
                $sql = "INSERT INTO vendas(nome_cliente, nome_funcionario, bike_descricao, bike_quantidade, bike_preco, data_compra)
                VALUES (:nome_cliente, :nome_funcionario, :bike_descricao, :bike_quantidade, :bike_preco, current_date())";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome_cliente", $nome_cliente);
                $stmt->bindparam(":nome_funcionario", $nome_funcionario);
                $stmt->bindparam(":bike_descricao", $bike_descricao);
                $stmt->bindparam(":bike_quantidade", $bike_quantidade);
                $stmt->bindparam(":bike_preco", $bike_preco);
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