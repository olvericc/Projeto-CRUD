<?php
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
    <title> Cadastro de Funcionários </title>
</head>

<!-- Estilo CSS -->

<style>
    body
    {
        background: linear-gradient(-85deg,  #33ccff 0%,  #ff99cc 100%);
    }
</style>

<body>

<!-- Tabela com Dados -->

    <div class="container">

    <h2>Funcionário</h2>
        <table class="table table-condensed">
        <p>
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModalCadastrar">
                <span class="glyphicon glyphicon-user"></span> Cadastrar Funcionário
            </button>
        </p>

        <!-- Tipos de dados -->

    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Código</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr> 
    </thead>

    <!-- Tabela -->

<tbody>
    <?php
        $query = "select * from funcionarios";
        $stmt = $objFuncionario->runQuery($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($rowFuncionario = $stmt->fetch(PDO::FETCH_ASSOC)){
        
    ?>  
    <tr>
        <!-- BLOCO NOME -->
        <td> 
            <?php echo($rowFuncionario['nome_f']); ?> 
        </td>
        <!-- BLOCO CPF -->
        <td> 
            <?php echo($rowFuncionario['cpf']); ?> 
        </td>
        <!-- BLOCO CODIGO -->
        <td> 
            <?php echo($rowFuncionario['codigo_f']); ?> 
        </td>
        <!-- BLOCO EDITAR -->
        <td>
            <p>
                <a href="#">
                    <span class="glyphicon glyphicon-pencil"
                        data-toggle="modal" data-target="#myModalEditar"
                        data-funcionarioid_f="<?php echo $rowFuncionario['id_f'] ?>"   
                        data-funcionarionome_f="<?php echo $rowFuncionario['nome_f'] ?>"
                        data-funcionariocpf="<?php echo $rowFuncionario['cpf'] ?>"
                        data-funcionariocodigo_f="<?php echo $rowFuncionario['codigo_f'] ?>">
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
                        data-funcionarioid_f="<?php echo $rowFuncionario['id_f'] ?>" 
                        data-funcionarionome_f="<?php echo $rowFuncionario['nome_f'] ?>">      
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
       
<!-- Modal Cadastrar Funcionário -->
    
    <div class="modal fade" id="myModalCadastrar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastrar Funcionário</h4>
        </div>

        <div class="modal-body">
            <form action="../control/ctrl_funcionario.php" method="POST">
            <input type="hidden" name="insert" value="1">
                <!-- NOME -->
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="txtNome">
                </div>
                <!-- CPF -->
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="txtCpf">
                </div>
                <!-- CODIGO -->
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="number" class="form-control" id="codigo_f" name="txtCodigo">
                </div>

                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Deletar Funcionário -->
    
    <div class="modal fade" id="myModalDeletar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Deletar Funcionário</h4>
        </div>

        <div class="modal-body">
            <form action="../control/ctrl_funcionario.php" method="POST">
            <input type="hidden" name="delete_id" value="" id="recipient-id_f">
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Editar Funcionário -->
    
    <div class="modal fade" id="myModalEditar" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Funcionário</h4>
        </div>  

        <div class="modal-body">
            <form action="../control/ctrl_funcionario.php" method="POST">
            <input type="hidden" name="editar_id" value="" id="recipient-id_f">
                <!-- NOME -->
                <div class="form-group">    
                    <label for="nome_f">Nome:</label>
                    <input type="text" class="form-control" id="recipient-nome_f" name="txtNome">
                </div>
                <!-- CPF -->
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="recipient-cpf" name="txtCpf">
                </div>
                <!-- CÓDIGO -->
                <div class="form-group">
                    <label for="codigo_f">Código:</label>
                    <input type="number" class="form-control" id="recipient-codigo_f" name="txtCodigo">
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
        <li><a href="../view/cliente.php">RETORNAR</a></li>
        <li><a href="../index.html">HOME</a></li>
        <li><a href="../view/produtos.php">AVANÇAR</a></li>
</ul>

<!-- Script do Deletar Funcionário -->

    <script>
        $('#myModalDeletar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid_f = button.data('funcionarioid_f');
            var recipientnome_f = button.data('funcionarionome_f');

            var modal = $(this)
            modal.find('.modal-title').text('Tem certeza que deseja deletar o funcionário '+recipientnome_f);
            modal.find('#recipient-id_f').val(recipientid_f);
            modal.find('#recipient-nome_f').val(recipientnome_f);
        })      
</script>

<!-- Script do Editar Funcionário -->

    <script>
        $('#myModalEditar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid_f = button.data('funcionarioid_f');
            var recipientnome_f = button.data('funcionarionome_f');
            var recipientcpf = button.data('funcionariocpf');
            var recipientcodigo_f = button.data('funcionariocodigo_f');

            var modal = $(this)
            modal.find('.modal-title').text('Editar funcionário');
            modal.find('#recipient-id_f').val(recipientid_f);
            modal.find('#recipient-nome_f').val(recipientnome_f);
            modal.find('#recipient-cpf').val(recipientcpf);  
            modal.find('#recipient-codigo_f').val(recipientcodigo_f);
        })      
</script>

</body>

</html>