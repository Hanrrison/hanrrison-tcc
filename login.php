<!DOCTYPE html>
<?php
require_once 'php/conexao.php';
require_once 'class/usuario.php';
$u = new Usuario;

?>

<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/login.css">

	<title>Login - TCC</title>


</head>

<body>
    <!-- Conteúdo -->
    
	<form method="POST">
        <h2>Login</h2>
        <input type ="text" placeholder="Usuário" name="usuario">
        <input type ="password" placeholder="Senha" name="senha">
        <input type ="submit" class="login" value="Entrar">

        <div class="links">
        <a href="#">Esqueceu a senha?</a><br>
        <a href="#">Não tem uma conta? Cadastre-se</a>
        </div>
    </form>

<?php
//verificar se clicou no botao
if(isset($_POST['usuario'])){
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);
    //verificar se esta preenchido
        if(!empty($usuario) && !empty($senha))
        {
            $u->conectar("a5cs5fjis77aj3b5", "alv4v3hlsipxnujn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com",
            "lwk8f7zk8565v63f","z9zpne3a9ulmh9hg");
            if($u->msgErro == "")
            {
                if($u->login($usuario, $senha))
                {
                    header ("location: home.php");
                } 
                else
                {
                    echo "<script>alert('Usuário ou senha incorreta');</script>";
                }
            } 
            else
            {
                echo "Erro: ".$u->msgErro;
            }
        } 
    else
    {
        echo "<script>alert('Por favor, preencha todos os dados!');</script>";
    }
}

?>   

</body>

</html>