<?php
    require_once '../model/produtos.php';

    //Objeto Produto

    $objProduto = new Produtos();

    //Deletar registro de produtos  

    if(isset($_POST['delete_id'])){
        $id_p = $_POST['delete_id'];
        if($objProduto->delete($id_p)){
            $objProduto->redirect('../view/produtos.php');
        }
    }

    //Inserir registro de produtos

    if(isset($_POST['insert'])){
        $descricao = $_POST['txtDescricao'];
        $quantidade = $_POST['txtQuantidade'];
        $preco = $_POST['txtPreco'];
        $codigo_p = $_POST['txtCodigo'];
        if($objProduto->insert($descricao, $quantidade, $preco, $codigo_p)){
            $objProduto->redirect('../view/produtos.php');
        }
    }

    //Editar registro de produtos

    if(isset($_POST['editar_id'])){
        $id_p = $_POST['editar_id'];
        $descricao = $_POST['txtDescricao'];
        $quantidade = $_POST['txtQuantidade'];
        $preco = $_POST['txtPreco'];
        $codigo_p = $_POST['txtCodigo'];
        if($objProduto->update($descricao, $quantidade, $preco, $codigo_p, $id_p)){
            $objProduto->redirect('../view/produtos.php');
        }
    }
?>
