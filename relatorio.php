<?php
  session_start();
  include_once "funcao.php";
  $jogador = obterJogadorByEmail($_SESSION['email']);
  $questoes = obterRelatorio($jogador["id"]);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Relatório</h1>
      <a class="btn btn-primary" href="index.php">Voltar</a>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">pergunta</th>           
            <th scope="col">resposta</th>            
            <th scope="col">certa</th>           
          </tr>
        </thead>
        <tbody>
          <?php
              foreach ($questoes as $questao) {
                echo "<tr>";
                echo "<td scope='col'>".$questao['jogador_id']."</td>";
                echo "<td scope='col'>".$questao['pergunta']."</td>";
                echo "<td scope='col'>".$questao['resposta']."</td>";
                echo "<td scope='col'>".$questao['certa']."</td>";           
                echo "</tr>";
              }
           ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
