<?php
session_start();
if(!isset($_SESSION['id_usuario'])){//se nao esta logado, volta pra tela login
	header("location: login.php");
	exit;
}

require_once 'php/conexao.php';
require_once 'class/usuario.php';
$usuario = new usuario;
$conn = new conexao;

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="../css/classificacao.css">


	<title>Bem vindo a home</title>


</head>

<body>
	<!-- Conteúdo -->

	<header class="header">
	<img height="100%" id="logo" src="../logotipo.png">
		<div class="login">
		<a href="./php/logout.php" class="logout">
		<?php echo "Bem vindo, " . $_SESSION['usuario'];?>
		</a>
		</div>
	</header>

	<nav class="menu">
			<ul>
				<input type="radio" name="menu" id="dashboard" checked>
				<li>
					<label for="dashboard" class="title">Principal</label>
					<a href="home.php">Dashboard</a>
				</li>
				<input type="radio" name="menu" id="cadastro">
				<li>
					<label for="cadastro" class="title">Cadastro</label>
					<a href="classificacao.php">Cadastro de Classificação</a>
					<a href="contas.php">Cadastro de Contas</a>
				</li>
				<input type="radio" name="menu" id="movimentacao">
				<li>
					<label for="movimentacao" class="title">Movimentação</label>
					<a href="transacoes.php">Transações</a>
					<a href="relatorioreceitas.php">Receitas</a>
					<a href="relatoriodespesas.php">Despesas</a>
				</li>
			</ul>
		</nav>




	<div id="main">

		<div class="pagetitle">
			<h2>Cadastro de Classificação</h2>
		</div>

		<div class="info">
			<div class="wrapper">
				<div class="box">

					<form method="POST">
						<fieldset>
                            
							<input type="text" size="12" name="classificacao" placeholder="Classificaçao">
                          

                            <label>Tipo
							<select name="tipoclassificacao">
								<option value=""><span>Tipo de Classificacao</span></option>
								<?php
									$conn = new conexao;
									$conn->getConnection();
									echo $usuario->tipoclassificacao();
								?>
							</select></label><br>

							<input type ="submit" class="btnclassificacao" value="Confirmar">

						</fieldset>
					</form>

					<?php
					
					if(isset($_POST['classificacao'])){
						$classificacao = addslashes($_POST['classificacao']);

                        if(empty($classificacao)){
                            echo "<script>alert('Preencha a classificação');</script>";
                        }else{
                            $conn = new conexao;
							$conn->getConnection();

								if ($usuario->classificacao($classificacao)) {
										echo "<script>alert('Classificação cadastrada com sucesso!');</script>";
								}
                        }
                    }

					?>

				</div>
			</div>


			<footer class="rodape">
				Todos os direitos reservados
			</footer>


</body>

</html>