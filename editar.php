<?php
  include_once "funcao.php";

  $id = $_GET['id'];
  $questao = obterQuestaoById($id);

  include_once "formulario.php";
 ?>
