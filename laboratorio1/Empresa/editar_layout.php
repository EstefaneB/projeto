<?php
include 'conexao.php';

$id = $_GET['id'];

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
<html>
<head>
    <title>Editar Layout - Cores Padrão</title>
</head>
<body>
    <h1>Editar Layout - Cores Padrão</h1>

    <form method="post" action="salvar_cores.php?id=<?php echo $id; ?>">
        <label for="cor1">Cor Padrão 1:</label>
        <input type="color" id="cor1" name="cor1"><br><br>

        <label for="cor2">Cor Padrão 2:</label>
        <input type="color" id="cor2" name="cor2"><br><br>

        <button type="submit" name="salvar_cores">Salvar Cores</button>
    </form>
</body>
</html>
