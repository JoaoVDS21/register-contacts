<?php

require_once 'Conexao.php';

class Contato{
    private $idcontato;
    private $nome; 
    private $numero;
    private $email;  
    private $conn; 
    
    function __construct(){
        $this->idcontato = 0;
        $this->nome = "";
        $this->numero = "";
        $this->email = "";
        $this->conn = new Connection();
    }

    /**
     * Get the value of idcontato
     */ 
    public function getIdcontato()
    {
        return $this->idcontato;
    }

    /**
     * Set the value of idcontato
     *
     * @return  self
     */ 
    public function setIdcontato($idcontato)
    {
        $this->idcontato = $idcontato;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    function cadastrar(){
        try{
            $sql = 'INSERT INTO contato VALUES(0, :nome, :num, :email)';
            $stmt = $this->conn->conectar()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':num', $this->numero);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }

    function listar(){
        try{
            $sql = "SELECT * FROM contato";
            $stmt = $this->conn->conectar()->query($sql);
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($res);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }
}


?>