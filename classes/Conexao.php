<?php
    
    class Connection{
        private $host;
        private $dbname;
        private $user;
        private $password;

        public function __construct()
        {
            $this->host = "localhost";
            $this->dbname = "dbcontatos";
            $this->user = "root";
            $this->password = ""; 
        }

        public function conectar(){
            try{
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                echo "Connection failed: " + $e->getMessage();
            }
            return $this->conn;
        }

    }
    
    
?>