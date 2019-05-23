<?php
session_start();
require_once 'conexao.php';
$conn = new conexao;

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$conn->getConnection();

$sql = $conn->prepare("SELECT id_usuario FROM usuarios
        WHERE usuario = '$usuario' AND senha = :senha");
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
         
        if($sql->rowCount() > 0){//entrando no sistema
            $dados = $sql->fetch();//transforma os dados do banco em array com os nomes das colunas      
             $_SESSION['id_usuario'] = $dados['id_usuario'];   //NAO USAR ECHO COM SESSAO
             $_SESSION['usuario'] = $usuario;
             header('location: /home.php');
        } else{
            unset ($_SESSION['id_usuario']);
            header("location: /login.php");//nao foi possivel logar
        }
?>