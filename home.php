<?php
session_start();
	if(!isset($_SESSION['id_usuario'])){//se nao esta logado, volta pra tela login
		header("location: login.php");
		exit;
	}

	require_once 'php/conexao.php';
	require_once 'class/despesas.php';
	require_once 'class/receitas.php';
	$tabela_despesa = new despesas;
	$tabela_receita = new receitas;
	$conn = new conexao;
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/stylehome.css">
	<script type="text/javascript" src="../js/main.js"></script>


	<title>Bem vindo a home</title>

	
</head>

<body>
	<!-- Conteúdo -->

	<header class="header">
		<img height="100%" id="logo" src="http://www.chicledigital.com.br/wp-content/uploads/criacao-de-logotipo.png">
		<div class="login" onclick="logout();">
			<?php echo "Bem vindo, " . $_SESSION['usuario'];?>
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
					<a href="#">Cadastro de Classificação</a>
					<a href="#">Cadastro de Contas</a>
				</li>
				<input type="radio" name="menu" id="tools">
				<li>
					<label for="tools" class="title">Movimentação</label>
					<a href="transacoes.php">Transações</a>
					<a href="#">Receitas</a>
					<a href="#">Despesas</a>
				</li>
			</ul>
		</nav>


	<div id="main">

		<div class="pagetitle">
			<h2>Dashboard</h2>
		</div>

		<div class="infocards">
			<div class="infocardswrap">
				<div class="cards">
						<div class="item">
							
						Saldo<br>
						R$: 2020,00</div>
				</div>

				<div class="cards">
						<div class="item2">
						<?php
						$conn = new conexao;
						$conn->getConnection();
						$pagar = new despesas;
						$pagar->soma_total_despesas();
						?>
					</div>
				</div>

				<div class="cards">
						<div class="item3">
						<?php
							$conn = new conexao;
							$conn->getConnection();
							$receber = new receitas;
							$receber->soma_total_receitas();
						?>
					</div>
				</div>
			</div>
		</div>


		<div class="info">
			<div class="wrapper">
				
				<div class="box">
					<div class="boxrendas">
						<h2 class="titlerendas">Últimas 5 rendas
							<input type="button" class="btnrendas" value="Detalhes" onclick="detalhesrenda();">
						</h2>

						<?php
							$conn = new conexao;
							$conn->getConnection();
							$tabela_receita->ultimas_5_receitas();
						?>
					</div>
					
					

				</div>

				<div class="box2">
					<div class="boxdespesas">
						<h2 class="titledespesas">Últimas 5 despesas
							<input type="button" class="btndespesas" value="Detalhes" onclick="detalhesdespesas();">
						</h2>
						
						<?php
							$conn = new conexao;
							$conn->getConnection();
							$tabela_despesa->ultimas_5_despesas();
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