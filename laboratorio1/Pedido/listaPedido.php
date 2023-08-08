<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM pedido');
  $retorno->execute();

?> 
<div class="conteiner">
<div class="header">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #ffd55a; height:13VH;" >
      <div class="container-fluid">
        <a class="navbar-brand" href="#">LISTA DOS ALUNOS</a>
      </div>
    </nav>
  </div>    

<div class="container mt-3">

  <table class="table table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th style="padding-left: 0%;">ID</th>
            <th>NOME</th>
            <th>SENHA</th>
            <th>TELEFONE</th>
            <th>ENDEREÇO</th>
            
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($retorno->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['nome'] ?></td>
                <td><?php echo $value['senha'] ?></td>
                <td><?php echo $value['telefone'] ?></td>
                <td><?php echo $value['endereco'] ?></td>
                
                

                <td>
                    <form method="POST" action="altAdm.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                        <button name="alterar" type="submit">Alterar</button>
                    </form>
                </td>

                <td>
                    <form method="GET" action="crudAdm.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                        <button name="excluir" type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>  


<?php         
   echo "<button class='button button3'><a href='index.php'>voltar</a></button>";
?>
</body>
</html>