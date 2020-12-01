<?php
    require_once '../model/cliente.php';
    
    //Objeto Cliente
    
    $objCliente = new Clientes();

    //Deletar registro de clientes

    if(isset($_POST['delete_id'])){  
        $id_c = $_POST['delete_id'];
        if($objCliente->delete($id_c)){
            $objCliente->redirect('../view/cliente.php');
        }
    }

    //Inserir registro de clientes

    if(isset($_POST['insert'])){
        $nome_c = $_POST['txtNome'];
        $idade = $_POST['txtIdade'];
        $sexo = $_POST['txtSexo'];
        $codigo_c = $_POST['txtCodigo'];
        if($objCliente->insert($nome_c, $idade, $sexo, $codigo_c)){
            $objCliente->redirect('../view/cliente.php'); 
        }
        
    }

    //Editar registro de clientes

    if(isset($_POST['editar_id'])){         
        $id_c = $_POST['editar_id'];    
        $nome_c = $_POST['txtNome'];
        $idade = $_POST['txtIdade'];
        $sexo = $_POST['txtSexo'];
        $codigo_c = $_POST['txtCodigo'];
        if($objCliente->update($nome_c, $idade, $sexo, $codigo_c, $id_c)){
            $objCliente->redirect('../view/cliente.php');
        }
    }
?>

