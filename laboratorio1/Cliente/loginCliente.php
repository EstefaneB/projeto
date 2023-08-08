<?php
require_once('conexao.php');

if(isset($_POST['logar'])){
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM cliente WHERE nome = :nome AND senha = :senha";
    $stmt = $conexao->prepare($sql);

    // Limpar e validar os dados de entrada
    $nome = htmlspecialchars($nome);
    $senha = htmlspecialchars($senha);

    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    
    if($stmt->execute()){
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($usuario){
            // Iniciar sessão ou tomar outras medidas de autenticação
            // ...

            // Redirecionar para a página após o login bem-sucedido
            header("Location: index.php");
            exit();
        } else {
            echo "Nome ou senha inválidos. Tente novamente.";
        }
    } else {
        echo "Ocorreu um erro ao executar a consulta.";
    }
}
?>
