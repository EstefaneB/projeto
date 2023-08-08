<?php 
//Criar as constantes com as credencias de acesso ao banco de dados
define('HOST', '127.0.0.1:3306');
define('USUARIO', 'root');
define('SENHA', '123456');
define('DBNAME', 'laboratorio');

//Criar a conexão com banco de dados usando o PDO e a porta do banco de dados
//Utilizar o Try/Catch para verificar a conexão.
try {

    $conexao = new pdo('mysql:host=' . HOST . ';dbname=' .
                                     DBNAME, USUARIO, SENHA);
} catch (PDOException $e) {
    echo "Error: Connection to the database could not be established. Error Message: " . $e->getMessage();
    
    
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso.
     Erro gerado " . $e->getMessage();
}


?>