<?php
  session_start();
  if (! isset($_SESSION['email'])) {
    $erro = "Usuário não logado";
    include_once "login.php";
    exit(0);
  }
  include_once "funcao.php";
  $jogador = obterJogadorByEmail($_SESSION['email']);
  $questao = obterQuestao($jogador["id"]);
  $quantidadeQuestoes = obterQuantidadeQuestoes();
  $quantidadeRespostas = obterQuantidadeRespostas($jogador["id"]);
  $quantidadeRespostas++;
  //if (!$questao) {
  //echo "quiz encerrado";
  //exit(0);
  //}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="questao.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <header>
        <h1>Quiz</h1>
        <p>Usuário: <?php echo $_SESSION["email"]; ?></p>
        <button type="button" class="btn btn-warning"><a href="resetar.php">Resetar Jogo</a></button>
        <button type="button" class="btn btn-info"><a href="relatorio.php">Relatório</a></button>
        <button type="button" class="btn btn-danger"><a href="logout.php">Logout</a></button> 

        <?php
              echo "<p style='text-align:right'> ($quantidadeRespostas / $quantidadeQuestoes) </p>"
         ?>
    </header>
    <section>
      <form action="salvaResposta.php" method="post">
          <h1><?php echo $questao['pergunta']; ?></h1>
          <input type="radio" name="resposta" value="a"><?php echo $questao['opcao_a']; ?><br>
          <input type="radio" name="resposta" value="b"><?php echo $questao['opcao_b']; ?><br>
          <input type="radio" name="resposta" value="c"><?php echo $questao['opcao_c']; ?><br>
          <input type="hidden" name="id" value= <?php echo $questao['id']; ?>>
          <div>
            <button type="submit" name="button">Responder</button>
          </div>
      </form>
    </section>
    <footer>Construção de Páginas Web II - 2019.1</footer>
  </body>
</html>
