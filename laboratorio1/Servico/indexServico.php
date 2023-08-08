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

// Consulta os serviços do banco de dados
$query = "SELECT id, nome, preco FROM servicos";
$resultado = $conexao->query($query);

$servicos = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Serviços da Empresa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: <?php echo $empresa['cor2']; ?>;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: <?php echo $empresa['cor1']; ?>;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #333;
    }
    .servico {
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ddd;
      background-color: #fff;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
<div class="container">
    <h1>Serviços da Empresa</h1>
    <?php
      // Supondo que você já tenha uma conexão com o banco de dados usando PDO
      include 'conexao.php'; // Inclui o arquivo de conexão

      $query = "SELECT nome, preco FROM servicos"; // Sua consulta SQL
      $resultado = $conexao->query($query);

      foreach ($resultado as $servico) {
        echo '<div class="servico">';
        echo '<h2>' . $servico['nome'] . '</h2>';
        echo '<p>Preço: R$ ' . number_format($servico['preco'], 2, ',', '.') . '</p>';
        echo '</div>';
      }
    ?>
</div>

</body>
</html>
