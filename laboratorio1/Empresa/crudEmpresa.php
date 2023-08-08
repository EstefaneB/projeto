<?php
##permite acesso as variaves dentro do aquivo conexao
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');

##cadastrar
if (isset($_POST['cadastrar'])) {
    $nome_fantasia = $_POST["nome_fantasia"];
    $telefone_comercial = $_POST["telefone_comercial"];
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $endereco = $_POST["endereco"];
    $cnpj = $_POST["cnpj"];
    $razao_social = $_POST["razao_social"];

    // Processamento da imagem
    if (isset($_FILES["logo"])) {
        $targetDirectory = "Empresa/imagens_logos";
        $targetFile = $targetDirectory . basename($_FILES["logo"]["name"]);
        move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile);
        $logoPath = $targetFile;
    } else {
        $logoPath = ""; // Ou outro valor padrão, caso a imagem não seja enviada
    }

    // Código SQL
    $sql = "INSERT INTO empresa(nome_fantasia, endereco, email, telefone_comercial, cnpj, razao_social, logo_path) 
            VALUES(:nome_fantasia, :endereco, :email, :telefone_comercial, :cnpj, :razao_social, :logoPath)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome_fantasia', $nome_fantasia, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':telefone_comercial', $telefone_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
    $stmt->bindParam(':razao_social', $razao_social, PDO::PARAM_STR);
    $stmt->bindParam(':logoPath', $logoPath, PDO::PARAM_STR);

    // Executa o SQL no banco de dados
    if ($stmt->execute()) {
        echo "<strong>OK!</strong> A empresa $nome_fantasia foi incluída com sucesso!";
        echo "<button class='button'><a href='index.php'>Voltar</a></button>";
    } else {
        echo "Erro ao cadastrar a empresa.";
    }
}

#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nome_fantasia = $_POST["nome_fantasia"];
    $id = $_POST["id"];
    $endereco = $_POST["endereco"];
    $telefone_comercial = $_POST["telefone_comercial"];
    $email = $_POST["email"];
    $cnpj = $_POST["cnpj"];
    $razao_social = $_POST["razao_social"];
    
   
      ##codigo sql
    $sql = "UPDATE  empresa SET nome_fantasia= :nome_fantasia,  endereco= :endereco,
     telefone_comercial= :telefone_comercial, cnpj= :cnpj, razao_social= :razao_social, email= :email  WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome_fantasia',$nome_fantasia, PDO::PARAM_STR);
    $stmt->bindParam(':telefone_comercial',$telefone_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->bindParam(':razao_social',$razao_social, PDO::PARAM_STR);
    $stmt->bindParam(':cnpj',$cnpj, PDO::PARAM_STR);

    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $nome_fantasia foi Alterado com sucesso!!!"; 

            echo " <button class='button'><a href='listaEmpresa.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `empresa` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listaEmpresa.php'>voltar</a></button>";
        }

}

####### EDITAR LAYOUT
if(isset($_POST['editar_layout'])){

    ##dados recebidos pelo metodo POST

    $id = $_POST["id"];
   
      ##codigo sql
    $sql = "SELECT * FROM empresa WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);

    $stmt->execute();
 
    // Busca os dados da empresa
    $empresa = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($empresa) {
        // Redirecionar para a página de edição com os dados da empresa
        header("Location: editar_layout.php?id=" . $id);
        exit();
    } else {
        // Caso não encontre a empresa, você pode tratar isso de alguma forma
        // Por exemplo, exibindo uma mensagem de erro
        echo "Empresa não encontrada.";
    }

}        


        
?>
