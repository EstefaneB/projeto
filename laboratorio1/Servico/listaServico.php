<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #6EC6CA;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #05585C;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }
        .custom-table {
          width: 100%;
          border-collapse: collapse;
           box-shadow: 0px 3px 6px #00000029; /* Sombra */
          }

        .custom-table th,
        .custom-table td {
          padding: 10px;
          text-align: left;
        }

        .custom-table th {
          background-color: #05585C;
          color: white;
        }

        .custom-table tbody tr:nth-child(even) {
          background-color: #6EC6CA;
        }

        /* Estilo para os botões */
        .custom-button {
          background-color: #6EC6CA;
          border: none;
          color: white;
          padding: 6px 12px;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }

        .custom-button:hover {
          background-color: #05585C;
        }

    </style>
</head>
<body>
    <div class="content">
        <h1 style="text-align: center; color: #8474A1;">Perfil dos Serviços</h1>
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM servico');
  $retorno->execute();

?> 

<div class="container mt-3">
            <table class="custom-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOME</th>
                  <th>PREÇO</th>
                  <th>ALTERAR</th>
                  <th>EXCLUIR</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($retorno->fetchAll() as $value) { ?>
                  <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['nome'] ?></td>
                    <td><?php echo $value['preco'] ?></td>
                    <td>
                      <form method="POST" action="altServico.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                        <button class="custom-button" name="alterar" type="submit">Alterar</button>
                      </form>
                    </td>
                    <td>
                      <form method="GET" action="crudServico.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                        <button class="custom-button" name="excluir" type="submit">Excluir</button>
                      </form>
                    </td>
                      
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <a class="custom-button" href="cadServico.php" style="text-decoration: none; position: absolute; margin-top: 20px;">Adicionar</a>
          </div>

    </div>
</body>
</html>