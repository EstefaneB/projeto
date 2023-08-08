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
   $sql = "SELECT * FROM funcionario where id= :id";
   
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
   $cpf = $array_retorno['cpf'];


?>

    <div class="container">
        <h2>ALTERAR</h2>
        <form action="crudFunc.php" method="POST">
              <p>Nome: <br> <input type="text" name="nome" id="" value=<?php echo $nome?> ></p>
                                                
              <p>Telefone: <br><input type="text" name="telefone" id="" value=<?php echo $telefone ?> ></p>  
                                         
              <p>Senha: <br> <input type="text" name="senha" id="" value=<?php echo $senha ?> ></p>

              <p>Cpf: <br> <input type="text" name="cpf" id="" value=<?php echo $cpf ?> ></p>
                                                
                                               
              <input type="hidden" name="id" id="" value=<?php echo $id ?> >              
                                         
              <p>Enredeço: <br> <input type="text" name="endereco" id=""  value=<?php echo $endereco ?> ></p>
                                         
              <input type="submit" name="update" value="Alterar">
            
        </form>
    </div>
</body>
</html>
