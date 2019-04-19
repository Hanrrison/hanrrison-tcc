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
    <link rel="stylesheet" href="../css/cadastro.css">

	<title>Cadastro</title>


</head>

<body>
	<!-- Conteúdo -->

	<form method="POST">
        <h2>Cadastro</h2>
        <input type ="text" placeholder="Usuário" name="usuario" maxlength="40">
        <input type ="text" placeholder="E-mail" name="email" maxlength="40"> <!-- Incluir type email -->
        <input type ="password" placeholder="Senha" name="senha" maxlength="32">
        <input type ="password" placeholder="Confirmar Senha" name="confirmarsenha" maxlength="32">
        <input type ="submit" class="registrar" value="Registrar">
        <div class="links"><a href="login.php">Já tem um cadastro? Clique aqui para entrar</a></div>
    </form>
<?php
//verificar se clicou no botao
if(isset($_POST['usuario'])){
    $usuario = addslashes($_POST['usuario']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarsenha = addslashes($_POST['confirmarsenha']);
    //verificar se esta preenchido
    if(!empty($usuario) && !empty($email) && !empty($senha) && !empty($confirmarsenha)) //se nao esta vazio
    {
       $u->conectar();
       

        if($u->msgErro == "")
        { //se esta ok
            if($senha == $confirmarsenha)
            {
                if($u->cadastro_usuario($usuario, $email, $senha))
                {   
                    echo "<script>alert('Usuario cadastrado com sucesso!');</script>";
                } else{
                    echo "<script>alert('Usuario já cadastrado!');</script>";
                }
            } 
            else
            {
                echo "<script>alert('Senha e confirmar senha não conferem!');</script>";
            }
        } 
        else
        {
            echo "Erro: ".$u->msgErro;
        } 
    } else{
        echo "<script>alert('Por favor, preencha todos os dados!');</script>";
    }
}

?>


</body>

</html>