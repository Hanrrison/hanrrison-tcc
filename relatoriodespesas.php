<?php
session_start();
	if(!isset($_SESSION['id_usuario'])){//se nao esta logado, volta pra tela login
		header("location: login.php");
		exit;
	}

	require_once 'php/conexao.php';
	require_once 'class/despesas.php';
	require_once 'class/receitas.php';
	require_once 'class/usuario.php';
	$todasdespesas = new despesas;
	$conn = new conexao;
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/relatoriodespesas.css">
	<script type="text/javascript" src="../js/main.js"></script>


	<title>Bem vindo a home</title>

	
</head>

<body>
	<!-- Conteúdo -->

	<header class="header">
	<img height="100%" id="logo" src="../logotipo.png">
		<div class="login">
			<?php echo "Bem vindo, " . $_SESSION['usuario'];
			?>
		</div>
	</header>

	<nav class="menu">
			<ul>
				<input type="radio" name="menu" id="archive" checked>
				<li>
					<label for="archive" class="title">Principal</label>
					<a href="home.php">Dashboard</a>
				</li>
				<input type="radio" name="menu" id="edit">
				<li>
					<label for="edit" class="title">Cadastro</label>
					<a href="classificacao.php">Cadastro de Classificação</a>
					<a href="contas.php">Cadastro de Contas</a>
				</li>
				<input type="radio" name="menu" id="tools">
				<li>
					<label for="tools" class="title">Movimentação</label>
					<a href="transacoes.php">Transações</a>
					<a href="relatorioreceitas.php">Receitas</a>
					<a href="relatoriodespesas.php">Despesas</a>
				</li>
			</ul>
		</nav>


	<div id="main">

		<div class="pagetitle">
			<h2>Dashboard</h2>
		</div>


		<div class="info">
			<div class="wrapper">
				
            <div class="box2">
					<div class="boxdespesas">
						<h2 class="titledespesas">Todas as despesas</h2>
						
						<?php
							$conn = new conexao;
							$conn->getConnection();
							$todasdespesas->todasdespesas();
						?>
					</div>
					
				</div>

			</div>
		</div>









	</div>


	<footer class="rodape">
		Todos os direitos reservados
	</footer>


</body>

</html>