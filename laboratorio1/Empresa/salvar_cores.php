<?php
require_once('conexao.php');

if (isset($_POST['salvar_cores'])) {
    $id = $_GET['id'];
    $cor1 = $_POST["cor1"];
    $cor2 = $_POST["cor2"];

    $sql = "UPDATE empresa SET cor1 = :cor1, cor2 = :cor2 WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cor1', $cor1, PDO::PARAM_STR);
    $stmt->bindParam(':cor2', $cor2, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Cores padrão salvas com sucesso!";
        header("Location: index_empresa.php?id=$id");
        exit();
    } else {
        echo "Erro ao salvar as cores padrão.";
    }
}
?>
