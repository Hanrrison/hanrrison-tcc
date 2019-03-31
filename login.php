<!DOCTYPE html>
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
    
	<form action = "../HTML/php/login.php" method="POST">
        <h2>Login</h2>
        <input type ="text" placeholder="Usuário" name="usuario">
        <input type ="password" placeholder="Senha" name="senha">
        <input type ="submit" class="login" value="Entrar">

        <div class="links">
        <a href="#">Esqueceu a senha?</a><br>
        <a href="#">Não tem uma conta? Cadastre-se</a>
        </div>
    </form>

</body>

</html>