<?php
include '../conexao.php';

$id = $_GET['id']; // Recupera o ID da empresa da URL

$sql = "SELECT * FROM empresa WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$empresa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$empresa) {
    echo "Empresa não encontrada.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login na Clínica Dentária</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: <?php echo $empresa['cor2']; ?>;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: <?php echo $empresa['cor1']; ?>;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .button {
            color: white;
            background-color: green;
            border: none;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #08979D;
            opacity: 0.9;
        }

        p {
            color: white;
        }

    </style>
</head>

<body>
    
    <div class="login-container">
        <h2>Login </h2>
        <form method="POST" action="../Cliente/loginCliente.php">
            <div>
                <p>Nome: </p>
                <input type="text" name="nome">

                <p>Senha: </p>
                <input type="password" name="senha">
            </div>

            <input class="button" type="submit" name="logar" value="Fazer Login">
        </form>
    </div>
</body>
</html>