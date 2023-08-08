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
    <div class="container">
        <h2>CADASTRO</h2>
        <form action="crudPedido.php" method="GET">

            <label for="observacao">Observação:</label>
            <input type="text" name="observacao" required>
            
            <label for="preco_total">Preço Total:</label>
            <input type="text" name="preco_total" required>
            
            <input type="submit" name="cadastrar" value="Cadastrar">
        </form>
    </div>
</body>
</html>
