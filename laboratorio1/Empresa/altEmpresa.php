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
   $sql = "SELECT * FROM empresa where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome_fantasia = $array_retorno['nome_fantasia'];
   $telefone_comercial = $array_retorno['telefone_comercial'];
   $endereco = $array_retorno['endereco'];
   $email = $array_retorno['email'];
   $razao_social = $array_retorno['razao_social'];
   $cnpj = $array_retorno['cnpj'];


?>

<div class="box">

  <form method="POST" action="crudEmpresa.php" >
       
       <p>Nome: <br> <input type="text" name="nome_fantasia" id="" value=<?php echo $nome_fantasia?> ></p>
                                                
       <p>Telefone: <br><input type="text" name="telefone_comercial" id="" value=<?php echo $telefone_comercial ?> ></p>  

       <p>Endereço: <br> <input type="text" name="endereco" id="" value=<?php echo $endereco ?> ></p>
       
      
       <input type="hidden" name="id" id="" value=<?php echo $id ?> >


       <p>Email: <br> <input type="text" name="email" id=""  value=<?php echo $email ?> ></p>

       <p>CNPJ: <br> <input type="text" name="cnpj" id=""  value=<?php echo $cnpj ?> ></p>

       <p>Razão Social: <br> <input type="text" name="razao_social" id=""  value=<?php echo $razao_social ?> ></p>


       
      
      
        <input type="submit" name="update" value="Alterar">
      
        
  </form>
  
  </div>
  </div>
</body>
</html>