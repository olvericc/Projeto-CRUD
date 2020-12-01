<?php
    require_once '../model/funcionario.php';

    //Objeto Funcionário 

    $objFuncionario = new Funcionarios();

    //Deletar registro de funcionários

    if(isset($_POST['delete_id'])){
        $id_f = $_POST['delete_id'];
        if($objFuncionario->delete($id_f)){
            $objFuncionario->redirect('../view/funcionario.php');
        }
    }
    
    //Inserir registro de funcionários

    if(isset($_POST['insert'])){
        $nome_f = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $codigo_f = $_POST['txtCodigo'];
        if($objFuncionario->insert($nome_f, $cpf, $codigo_f)){
            $objFuncionario->redirect('../view/funcionario.php');
        }
    }

    //Editar registro de funcionários

    if(isset($_POST['editar_id'])){
        $id_f = $_POST['editar_id'];
        $nome_f = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $codigo_f = $_POST['txtCodigo'];
        if($objFuncionario->update($nome_f, $cpf, $codigo_f, $id_f)){
            $objFuncionario->redirect('../view/funcionario.php');
        }
    }
?>