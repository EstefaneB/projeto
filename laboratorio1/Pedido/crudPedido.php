<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');
##cadastrar
if (isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $observacao = $_GET["observacao"];
        $preco_total = $_GET["preco_total"];
        
        
       /* echo "$nome";*/

        ##codigo SQL
         $sql = "INSERT INTO pedido(observacao,preco_total) 
                VALUES('$observacao','$preco_total')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o aluno
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='index.php'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $observacao = $_POST["observacao"];
    $preco_total = $_POST["preco_total"];

    $nome = $_POST["nome"];
    $id = $_POST["id"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    
   
      ##codigo sql
    $sql = "UPDATE  adm SET nome= :nome,  endereco= :endereco,
     telefone= :telefone, senha= :senha  WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':telefone',$idade, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);

    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $nome foi Alterado com sucesso!!!"; 

            echo " <button class='button'><a href='index.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `adm` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listaalunos.php'>voltar</a></button>";
        }

}

        
?>
