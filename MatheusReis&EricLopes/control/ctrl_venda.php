<?php
    require_once '../model/venda.php';

    //Objeto Vendas

    $objVendas = new Vendas();

    //Inserir registro de Vendas

    if(isset($_POST['insert'])){
        $nome_cliente = $_POST['txtNomeCliente'];
        $nome_funcionario = $_POST['txtNomeFuncionario'];
        $bike_descricao = $_POST['txtBikeDescricao'];
        $bike_quantidade = $_POST['txtBikeQuantidade'];
        $bike_preco = $_POST['txtBikePreco'];
        if($objVendas->insert($nome_cliente, $nome_funcionario, $bike_descricao, $bike_quantidade, $bike_preco)){
            $objVendas->redirect('../view/venda.php');
        }
    }

?>


