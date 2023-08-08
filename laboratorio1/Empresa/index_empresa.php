<?php
include 'conexao.php';

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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Dentária</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,400&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap');
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }
        body{
            background-color: <?php echo $empresa['cor2']; ?>;
            max-width: 1200px;
            margin: 0;
        }
        header{
            width: 114%;
            background-color: <?php echo $empresa['cor1']; ?>;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        header h1{
            color: black;
            font-size: 2.5rem;
        }
        header span{
            color: white;
        }
        header .navegacao-primaria{
            display: flex;
            gap: 10px;
            align-items: center;
        }
        header .navegacao-primaria li a{
            padding: 20px;
            color: #000;
            font-size: 1.3rem;
        }
        .section-div{
            display:grid;
            grid-template-columns: 1.2fr 1fr;
            justify-content: space-around;
            align-items: center;
            gap: 60px;
            padding: 65px;
        }
        .section-div div{
            margin-top: 120px;
            align-self: start;
            display: grid;
            gap: 30px;
        }
        .section-div div h2{
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;

        }
        .section-div div p{
            font-family: 'Poppins';
            font-weight: 200;
        }
        .section-div div a{
            justify-self: start;
            color: white;
            padding: 15px 40px;
            border-radius: 5px;
            border: 2px solid white;
        }
        .rodape {
            background-color: <?php echo $empresa['cor1']; ?>;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h1> <?php echo $empresa['nome_fantasia']; ?> </h1>
        <nav>
            <ul class="navegacao-primaria">
                <li><a href="../Cliente/cadCliente.php?id=<?php echo $id; ?>">Cadastrar</a></li>
                <li><a href="login.php?id=<?php echo $id; ?>">Login</a></li>
                <li><a href="../Servico/listar_servicos.php?id=<?php echo $id; ?>">Servico</a></li>   
            </ul>
        </nav>
    </header>
    <section class="section-div">
    <div>
        <h2>Bem vindo à Empresa <?php echo $empresa['nome_fantasia']; ?> </h2>
        <!-- <h2 class="digitando"> web</h2>
        <p>Na procura de um site para promover visibilidade do seu negocio? Aqui podemos te ajudar com layouts e templates próprios para sua empresa</p> -->
    </div>
    </section>
    <footer class="rodape">
        <p>&copy; 2023 Meu Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>

