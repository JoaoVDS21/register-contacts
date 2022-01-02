<?php
    require_once "../classes/Contato.php";
    

    if(isset($_POST['op'])){
        foreach($_POST as $key => $value){
            $$key = $value;
        }

        $c = new Contato();
        
        switch($op){
            case 1: 
                $c->setNome($nome);
                $c->setNumero($numero);
                $c->setEmail($email);
                $c->cadastrar();
                break;
            case 2:
                $c->listar();
                break;
        }
    }
?>