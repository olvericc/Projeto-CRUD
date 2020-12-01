<?php
    require_once '../model/cliente.php';
    $objCliente = new Clientes();
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
    <title> Cadastro de Clientes </title>
</head>

<!-- Estilo CSS -->

<style>
    body
    {
        background: linear-gradient(90deg,  #33ccff 0%,  #ff99cc 100%);
    }   
</style>

<body>

<!-- Tabela com Dados -->

    <div class="container">

    <h2>Clientes</h2>
        <table class="table table-condensed">
        <p>
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModalCadastrar">
                <span class="glyphicon glyphicon-user"></span> Cadastrar Cliente
            </button>
        </p>

        <!-- Tipos de dados -->

    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Sexo</th>
            <th>Código</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr> 
    </thead>

    <!-- Tabela  -->  

<tbody>
    <?php
        $query = "select * from clientes";
        $stmt = $objCliente->runQuery($query);
        $stmt->execute(); 
        if($stmt->rowCount() > 0){
            while($rowCliente = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <!-- BLOCO NOME -->
        <td> 
            <?php echo($rowCliente['nome_c']); ?> 
        </td>
        <!-- BLOCO IDADE -->
        <td>
            <?php echo($rowCliente['idade']); ?> 
        </td>
        <!-- BLOCO SEXO -->
        <td>
            <?php echo($rowCliente['sexo']); ?>
        </td>
        <!-- BLOCO CODIGO -->
        <td>
            <?php echo($rowCliente['codigo_c']); ?>
        </td>
        <!-- BLOCO EDITAR -->
        <td>
            <p>
                <a href="#">
                    <span class="glyphicon glyphicon-pencil"
                        data-toggle="modal" data-target="#myModalEditar"
                        data-clienteid_c="<?php echo $rowCliente['id_c'] ?>"   
                        data-clientenome_c="<?php echo $rowCliente['nome_c'] ?>"
                        data-clienteidade="<?php echo $rowCliente['idade'] ?>"
                        data-clientesexo="<?php echo $rowCliente['sexo'] ?>"
                        data-clientecodigo_c="<?php echo $rowCliente['codigo_c'] ?>">
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
                        data-clienteid_c="<?php echo $rowCliente['id_c'] ?>" 
                        data-clientenome_c="<?php echo $rowCliente['nome_c'] ?>">      
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

<!-- Modal Cadastrar Cliente-->
    
    <div class="modal fade" id="myModalCadastrar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastrar Cliente</h4>
        </div>

        <div class="modal-body">
            <form action="../control/ctrl_cliente.php" method="POST">
            <input type="hidden" name="insert" value="1">
                <!-- NOME -->
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="txtNome">
                </div>
                <!-- IDADE -->
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" class="form-control" id="idade" name="txtIdade">
                </div>
                <!-- SEXO -->
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <input type="text" class="form-control" id="sexo" name="txtSexo">
                </div>
                <!-- CODIGO -->
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="number" class="form-control" id="codigo_c" name="txtCodigo">
                </div>

                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Deletar Cliente-->
    
    <div class="modal fade" id="myModalDeletar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deletar Cliente</h4>
        </div>

        <div class="modal-body">
            <form action="../control/ctrl_cliente.php" method="POST">
            <input type="hidden" name="delete_id" value="" id="recipient-id_c">
                <div class="form-group">    
                    
                </div>
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Editar Cliente-->
    
    <div class="modal fade" id="myModalEditar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cliente</h4>
        </div>  

        <div class="modal-body">
            <form action="../control/ctrl_cliente.php" method="POST">
            <input type="hidden" name="editar_id" value="" id="recipient-id_c">
                <!-- NOME -->
                <div class="form-group">    
                    <label for="nome_c">Nome:</label>
                    <input type="text" class="form-control" id="recipient-nome_c" name="txtNome">
                </div>
                <!-- IDADE -->
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" class="form-control" id="recipient-idade" name="txtIdade">
                </div>
                <!-- SEXO -->
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <input type="text" class="form-control" id="recipient-sexo" name="txtSexo">
                </div>
                <!-- CÓDIGO -->
                <div class="form-group">
                    <label for="codigo_c">Código:</label>
                    <input type="number" class="form-control" id="recipient-codigo_c" name="txtCodigo">
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
        <li><a href="../index.html">RETORNAR</a></li>
        <li><a href="../index.html">HOME</a></li>
        <li><a href="../view/funcionario.php">AVANÇAR</a></li>
</ul>

<!-- Script do Deletar Cliente -->

    <script>
        $('#myModalDeletar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid_c = button.data('clienteid_c');
            var recipientnome_c = button.data('clientenome_c');

            var modal = $(this)
            modal.find('.modal-title').text('Tem certeza que deseja deletar o cliente '+recipientnome_c);
            modal.find('#recipient-id_c').val(recipientid_c);
            modal.find('#recipient-nome_c').val(recipientnome_c);
        })      
</script>

<!-- Script do Editar Cliente -->

    <script>
        $('#myModalEditar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid_c = button.data('clienteid_c');
            var recipientnome_c = button.data('clientenome_c');
            var recipientidade = button.data('clienteidade');
            var recipientsexo = button.data('clientesexo');
            var recipientcodigo_c = button.data('clientecodigo_c');

            var modal = $(this)
            modal.find('.modal-title').text('Editar cliente');
            modal.find('#recipient-id_c').val(recipientid_c);
            modal.find('#recipient-nome_c').val(recipientnome_c);
            modal.find('#recipient-idade').val(recipientidade);
            modal.find('#recipient-sexo').val(recipientsexo);  
            modal.find('#recipient-codigo_c').val(recipientcodigo_c);
        })      
</script>

</body>

</html>


