<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
<body>
  <div class="conteiner">
  <div class="header">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #ffd55a; height:13VH;" >
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ALTERAR ALUNO</a>
      </div>
    </nav>
  </div>

<?php
    require_once('conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM adm_empresa WHERE id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $telefone = $array_retorno['telefone'];
   $endereco = $array_retorno['endereco'];
   $senha = $array_retorno['senha'];


?>

<div class="box">

  <form method="POST" action="crudAdm_Empresa.php" >
       
       <p>Nome: <br> <input type="text" name="nome" id="" value=<?php echo $nome?> ></p>
                                                
       <p>Telefone: <br><input type="text" name="telefone" id="" value=<?php echo $telefone ?> ></p>  

       <p>Senha: <br> <input type="text" name="senha" id="" value=<?php echo $senha ?> ></p>
       
      
       <input type="hidden" name="id" id="" value=<?php echo $id ?> >


       <p>Enredeço: <br> <input type="text" name="endereco" id=""  value=<?php echo $endereco ?> ></p>

       
      
      
        <input type="submit" name="update" value="Alterar">
      
        
  </form>
  
  </div>
  </div>
</body>
</html>