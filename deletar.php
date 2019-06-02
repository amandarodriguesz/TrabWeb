<?php
  include_once "funcao.php";
  $id = $_GET['id'];
  removerQuestao($id);
  header("location: listagem.php");
  exit();
 ?>
