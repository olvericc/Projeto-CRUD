<?php
    require_once '../model/produtos.php';
    $objProduto = new Produtos();
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
    <title> Cadastro de Produtos </title>
</head>

<!-- Estilo CSS -->

<style>
    body
    {
        background: linear-gradient(85deg,  #33ccff 0%,  #ff99cc 100%);
    }
</style>

<body>

<!-- Tabela com Dados -->

    <div class="container">

    <h2>Produtos</h2>
        <table class="table table-condensed">
        <p>
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModalCadastrar">
                <span class="glyphicon glyphicon-tag"></span> Cadastrar Produtos
            </button>
        </p>

        <!-- Tipos de dados -->

    <thead>
        <tr>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Código</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr> 
    </thead>

    <!-- Tabela -->

<tbody>
    <?php
        $query = "select * from produtos";
        $stmt = $objProduto->runQuery($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($rowProduto = $stmt->fetch(PDO::FETCH_ASSOC)){
        
    ?>  
    <tr>
        <!-- BLOCO DESCRIÇÃO -->
        <td> 
            <?php echo($rowProduto['descricao']); ?> 
        </td>
        <!-- BLOCO QUANTIDADE -->
        <td> 
            <?php echo($rowProduto['quantidade']); ?> 
        </td>
        <!-- BLOCO PREÇO -->
        <td> 
            <?php echo($rowProduto['preco']); ?> 
        </td>
        <!-- BLOCO CÓDIGO -->
        <td> 
            <?php echo($rowProduto['codigo_p']); ?> 
        </td>
        <!-- BLOCO EDITAR -->
        <td>
            <p>
                <a href="#">
                    <span class="glyphicon glyphicon-pencil"
                        data-toggle="modal" data-target="#myModalEditar"
                        data-produtoid_p="<?php echo $rowProduto['id_p'] ?>"   
                        data-produtodescricao="<?php echo $rowProduto['descricao'] ?>"
                        data-produtoquantidade="<?php echo $rowProduto['quantidade'] ?>"
                        data-produtopreco="<?php echo $rowProduto['preco'] ?>"
                        data-produtocodigo_p="<?php echo $rowProduto['codigo_p'] ?>">
                    </span>
                </a>
            </p>
        </td>
        <!-- BLOCO DELETAR -->
        <td>
            <p>
                <a href="#">
                    <span class="glyphicon glyphicon-trash"
                        data-toggle="modal" data-target="#myModalDeletar"
                        data-produtoid_p="<?php echo $rowProduto['id_p'] ?>" 
                        data-produtodescricao="<?php echo $rowProduto['descricao'] ?>">      
                    </span>
                </a>
            </p>
        </td>
    </tr>
    <?php
            }
        }
    ?>  
</tbody>  
        </table>
</div>

<!-- Modal Cadastrar Produto -->
    
<div class="modal fade" id="myModalCadastrar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastrar Produto</h4>
        </div>

        <div class="modal-body">
            <form action="../control/ctrl_produto.php" method="POST">
            <input type="hidden" name="insert" value="1">
                <!-- DESCRIÇÃO -->
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="txtDescricao">
                </div>
                <!-- QUANTIDADE -->
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" class="form-control" id="quantidade" name="txtQuantidade">
                </div>
                <!-- PREÇO -->
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" class="form-control" id="preco" name="txtPreco">
                </div>
                <!-- CÓDIGO -->
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="number" class="form-control" id="codigo_p" name="txtCodigo">
                </div>

                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Deletar Produto -->
    
<div class="modal fade" id="myModalDeletar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deletar Produto</h4>
        </div>

        <div class="modal-body">
            <form action="../control/ctrl_produto.php" method="POST">
            <input type="hidden" name="delete_id" value="" id="recipient-id_p">
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Editar Produto -->
    
<div class="modal fade" id="myModalEditar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Produto</h4>
        </div>  

        <div class="modal-body">
            <form action="../control/ctrl_produto.php" method="POST">
            <input type="hidden" name="editar_id" value="" id="recipient-id_p">
                <!-- DESCRIÇÃO -->
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="recipient-descricao" name="txtDescricao">
                </div>
                <!-- QUANTIDADE -->
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" class="form-control" id="recipient-quantidade" name="txtQuantidade">
                </div>
                <!-- PREÇO -->
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" class="form-control" id="recipient-preco" name="txtPreco">
                </div>
                <!-- CÓDIGO -->
                <div class="form-group">
                    <label for="codigo_p">Código:</label>
                    <input type="number" class="form-control" id="recipient-codigo_p" name="txtCodigo">
                </div>

                <button type="submit" class="btn btn-warning">Editar</button>
            </form>
        </div>
      </div>
    </div> 
</div>

<!-- Paginação -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <ul class="pager">
        <li><a href="../view/funcionario.php">RETORNAR</a></li>
        <li><a href="../index.html">HOME</a></li>
        <li><a href="../view/venda.php">AVANÇAR</a></li>
</ul>

<!-- Script do Deletar Produto -->

    <script>
        $('#myModalDeletar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid_p = button.data('produtoid_p');
            var recipientdescricao = button.data('produtodescricao');

            var modal = $(this)
            modal.find('.modal-title').text('Tem certeza que deseja deletar o produto '+recipientdescricao);
            modal.find('#recipient-id_p').val(recipientid_p);
            modal.find('#recipient-descricao').val(recipientdescricao);
        })      
    </script>

<!-- Script do Editar Funcionário -->

    <script>
        $('#myModalEditar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid_p = button.data('produtoid_p');
            var recipientdescricao = button.data('produtodescricao');
            var recipientquantidade = button.data('produtoquantidade');
            var recipientpreco = button.data('produtopreco');
            var recipientcodigo_p = button.data('produtocodigo_p');

            var modal = $(this)
            modal.find('.modal-title').text('Editar Produto');
            modal.find('#recipient-id_p').val(recipientid_p);
            modal.find('#recipient-descricao').val(recipientdescricao);
            modal.find('#recipient-quantidade').val(recipientquantidade);  
            modal.find('#recipient-preco').val(recipientpreco);  
            modal.find('#recipient-codigo_p').val(recipientcodigo_p);
        })      
    </script>

</body>
</html>

