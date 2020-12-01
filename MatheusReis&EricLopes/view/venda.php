<?php

//Cliente

    require_once '../model/cliente.php';
    $objCliente = new Clientes();

//Produto
    
    require_once '../model/produtos.php';
    $objProduto = new Produtos();

// Venda

    require_once '../model/venda.php';
    $objVenda =  new Vendas();
    
// Funcionario

    require_once '../model/funcionario.php';
    $objFuncionario = new Funcionarios();




?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="sortcut icon" href="../img/logo_projeto.png" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title> Venda </title>
</head>

<!-- Estilo CSS -->

<style>
    body
    {
        background: linear-gradient(-85deg,  #33ccff 0%,  #ff99cc 100%);
    }
</style>

<body>
    
<!-- Conteúdo  -->

    <div class="container">

    <h2>Vendas</h2>
    <table class="table table-condensed">
    <p>
        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModalVenda">
            <span class="glyphicon glyphicon-shopping-cart"></span> Realizar Venda
        </button>
</p>

    <thead>
        <tr>
            <th>Nome do Cliente</th>
            <th>Nome do Funcionario</th>
            <th>Descricao da Bike</th>
            <th>Quantidade da Bike</th>
            <th>Preço da Bike</th>
            <th>Data da Compra</th>
        </tr> 
    </thead>
    <tbody>
    <?php
        $query = "select * from vendas";
        $stmt = $objVenda->runQuery($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($rowVenda = $stmt->fetch(PDO::FETCH_ASSOC)){
        
    ?>  
    <tr>
        <!-- Nome do Cliente -->
        <td> 
            <?php echo($rowVenda['nome_cliente']); ?> 
        </td>
        <!-- Nome do Funcionário -->
        <td> 
            <?php echo($rowVenda['nome_funcionario']); ?> 
        </td>
        <!-- Decrição da Bike -->
        <td> 
            <?php echo($rowVenda['bike_descricao']); ?> 
        </td>
        <!-- Quantidade da Bike -->
        <td> 
            <?php echo($rowVenda['bike_quantidade']); ?> 
        </td>
        <!-- Preço da Bike -->
        <td> 
            <?php echo($rowVenda['bike_preco']); ?> 
        </td>
        <!-- Data da Compra -->
        <td> 
            <?php echo($rowVenda['data_compra']); ?> 
        </td>
    </tr>
    <?php
            }
        }
    ?>  
</tbody>  
        </table>

<!-- Modal Vendas -->
    
    <div class="modal fade" id="myModalVenda" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">  Realizar Venda </h4>
        </div>

        <div class="modal-body">
            <form action="../control/ctrl_venda.php" method="POST">
            <input type="hidden" name="insert" value="1">
            
    <!-- NOME CLIENTE -->

    <div class="form-group">
        <label for="nomeCliente">Nome do Cliente:</label>
        <select class="form-control"  id="nome_cliente" name="txtNC">
                <option value="" disabled selected> Selecione o Cliente </option>
                    
                    <?php
                        $query = "select * from clientes";
                        $stmt = $objCliente->runQuery($query);
                        $stmt->execute();
                        if($stmt->rowCount() > 0){
                        while($rowCliente = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>

                <option value="<?php echo($rowCliente['id_c']); ?>">
                    <?php 
                        echo($rowCliente['nome_c']); 
                    ?>
                        
                </option>
                    <?php
                    } 
                    
                    }  
                    ?>
        </select>
            <input type="text" name="txtNomeCliente" class="form-control" style="display:none" id="recipientnome_c" > 
    </div>

    <!-- NOME FUNCIONARIO -->

    <div class="form-group">
        <label for="nomeFuncionario">Nome do Funcionário:</label>
        <select class="form-control"  id="nome_funcionario" name="txtNF">
                <option value="" disabled selected> Selecione o Funcionário </option>
                    
                    <?php
                        $query = "select * from funcionarios";
                        $stmt = $objFuncionario->runQuery($query);
                        $stmt->execute();
                        if($stmt->rowCount() > 0){
                        while($rowFuncionario = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>

                <option value="<?php echo($rowFuncionario['nome_f']); ?>">
                    <?php 
                        echo($rowFuncionario['nome_f']); 
                    ?>
                        
                </option>
                    <?php
                    } 
                            
                    }  
                    ?>
        </select>
        <input type="text" name="txtNomeFuncionario" class="form-control" style="display:none" id="recipientnome_f" > 
    </div>

    <!-- DESCRICAO DA BIKE -->

    <div class="form-group">
        <label for="bike_descricao"> Descrição das Bikes: </label>
        <select class="form-control"  id="bike_descricao" name="txtBD">
                <option value="" disabled selected> Selecione a Descrição </option>
                   
                   <?php
                        $query = "select * from produtos";
                        $stmt = $objProduto->runQuery($query);
                        $stmt->execute();
                        if($stmt->rowCount() > 0){
                        while($rowProduto = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>

                <option value="<?php echo($rowProduto['bike_descricao']); ?>">
                    <?php 
                        echo($rowProduto['descricao']); 
                    ?>
                        
                </option>
                    <?php
                    } 
                            
                    }  
                    ?>
        </select>
        <input type="text" name="txtBikeDescricao" class="form-control" style="display:none" id="recipientbike_descricao" > 
    </div>

    <!-- QUANTIDADE DE BIKE -->

    <div class="form-group">
        <label for="bike_quantidade">Quantidade de Bikes: </label>
        <select class="form-control"  id="bike_quantidade" name="txtBQ">
                <option value="" disabled selected> Selecione a Quantidade </option>
                    
                    <?php
                        $query = "select * from produtos";
                        $stmt = $objProduto->runQuery($query);
                        $stmt->execute();
                        if($stmt->rowCount() > 0){
                        while($rowProduto = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>

                <option value="<?php echo($rowProduto['bike_quantidade']); ?>">
                    <?php 
                        echo($rowProduto['quantidade']); 
                    ?>
                        
                </option>
                    <?php
                    } 
                            
                    }  
                    ?>
        </select>
        <input type="text" name="txtBikeQuantidade" class="form-control" style="display:none" id="recipientbike_quantidade" > 
    </div>

    <!-- PRECO DA BIKE -->

    <div class="form-group">
        <label for="bike_preco"> Preço das Bikes: </label>
        <select class="form-control"  id="bike_preco" name="txtBP">
                <option value="" disabled selected> Selecione o Preço: </option>
                    
                    <?php
                        $query = "select * from produtos";
                        $stmt = $objProduto->runQuery($query);
                        $stmt->execute();
                        if($stmt->rowCount() > 0){
                        while($rowProduto = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>

                <option value="<?php echo($rowProduto['bike_preco']); ?>">
                    <?php 
                        echo($rowProduto['preco']); 
                    ?>
                        
                </option>
                    <?php
                    } 
                            
                    }  
                    ?>
        </select>
        <input type="text" name="txtBikePreco" class="form-control" style="display:none" id="recipientbike_preco" > 
 
    </div>
            <button type="submit" class="btn btn-success" >Enviar </button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Paginação -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <ul class="pager">
        <li><a href="../view/produtos.php">RETORNAR</a></li>
        <li><a href="../index.html">HOME</a></li>
        <li><a href="../relatorio.php">AVANÇAR</a></li>
    </ul>



<!-- Script -->

    <script>
           $("#myModalVenda").on("change",function(){
            
            var recipientnome_c = document.getElementById('nome_cliente')
            .options[document.getElementById('nome_cliente').selectedIndex].innerText;
            var recipientnome_f = document.getElementById('nome_funcionario')
            .options[document.getElementById('nome_funcionario').selectedIndex].innerText;
            var recipientbike_descricao = document.getElementById('bike_descricao')
            .options[document.getElementById('bike_descricao').selectedIndex].innerText;
            var recipientbike_quantidade = document.getElementById('bike_quantidade')
            .options[document.getElementById('bike_quantidade').selectedIndex].innerText;
            var recipientbike_preco = document.getElementById('bike_quantidade')
            .options[document.getElementById('bike_quantidade').selectedIndex].innerText;
            
            var modal = $(this)
           
            modal.find('#recipientnome_c').val(recipientnome_c);

            modal.find('#recipientnome_f').val(recipientnome_f);

            modal.find('#recipientbike_descricao').val(recipientbike_descricao);

            modal.find('#recipientbike_quantidade').val(recipientbike_quantidade);

            modal.find('#recipientbike_preco').val(recipientbike_preco);

           });
</script>
 
</body>
</html>