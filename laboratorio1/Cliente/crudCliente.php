<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');
##cadastrar
if (isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $telefone = $_GET["telefone"];
        $senha = $_GET["senha"];
        $endereco = $_GET["endereco"];
        $cpf = $_GET["cpf"];
        $email = $_GET["email"];
        $id_empresa = $_GET["id_empresa"];
        
       /* echo "$nome";*/

        ##codigo SQL
         $sql = "INSERT INTO cliente(nome,endereco,senha,telefone,email,cpf) 
                VALUES('$nome','$endereco','$senha','$telefone','$email','$cpf')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {

                echo " <strong>OK!</strong> o aluno
                $nome foi Incluido com sucesso!!!";
                echo "<button class='button'><a href='../Empresa/index_Empresa.php?id=" . $id_empresa . "'>voltar</a></button>";

            }
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nome = $_POST["nome"];
    $id = $_POST["id"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    
   
      ##codigo sql
    $sql = "UPDATE  cliente SET nome= :nome,  endereco= :endereco,
     telefone= :telefone, senha= :senha, email= :email, cpf= :cpf  WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':telefone',$idade, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR); 
    $stmt->bindParam(':cpf',$cpf, PDO::PARAM_INT);

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
    $sql ="DELETE FROM `cliente` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $id foi excluido!!!"; 

            echo " <button class='button'style='height: 70px; width: 200px; background-color: gray; border-radius: 20px; border-color: transparent; margin-bottom: 50px'><a href='index.php'>voltar</a></button>";
            
        }

}

        
?>
