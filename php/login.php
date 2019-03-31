<?php

//variaveis usuario, senha

include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
  header('Location: login.html');
  exit();
}


?>




