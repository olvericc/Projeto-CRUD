<?php
    class Database{
        private $userName = "root";
        private $senha = "";

        public $conn;

        public function dbConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO('mysql:host=localhost;dbname=super_bike',
                $this->userName, $this->senha);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
           }catch(PDOException $e){
                echo $e->getMessage();
                echo ("n conectado");
            }
            return $this->conn;
        }   
    }
?>