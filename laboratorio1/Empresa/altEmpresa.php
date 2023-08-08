<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Formulário de Cadastro</title>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,400&display=swap');
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #149bc2;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .container h2{
            display: flex;
            justify-content: center;
            font-family: 'Poppins';
        }
        
        form {
            display: flex;
            flex-direction: column;
            font-family: 'Poppins';
        }
        
        label, input {
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            background-color: #8474A1;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
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
    <div class="container">
        <h2>ALTERAR</h2>
        <form action="crudEmpresa.php" method="POST">
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
</body>
</html>
