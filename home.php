<?php
//session_start();
	//if(!isset($_SESSION['id_usuario'])){//se nao esta logado, volta pra tela login
		//header("location: login.php");
		//exit;
	//}
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
			<a href="#">Olá _Usuario</a>
		</div>
	</header>

	<nav id="menu">
		<ul>
			<li><a href="home.php">Dashboard</a></li>
			<li><a href="transacoes.php">Transações</a></li>
			<li><a href="#">Cadastro</a>

				<ul>
					<li><a href="#">Cadastro de Produtos</a></li>
					<li><a href="#">Cadastro de Fornecedor</a></li>
				</ul>
			</li>

			<li><a href="#">Movimentações</a>
				
				<ul>
					<li><a href="#">Entradas</a></li>
					<li><a href="#">Saídas</a></li>
				</ul>
			</li>

			<li><a href="#">Contas</a></li>
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
							
						Contas a Pagar<br>
						R$: 2020,00
					</div>
				</div>

				<div class="cards">
						<div class="item3">
								
						Contas a Receber<br>
						R$: 2020,00
					</div>
				</div>

				<div class="cards">
						<div class="item4">
								
						Cartao<br>
						R$: 2020,00
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
						
						<table class="tablerendas">
						<tr>
						  <th>Título</th>
						  <th>Data</th>
						  <th>Valor</th>
						</tr>
						<tr>
						  <td>Farmácia</td>
						  <td>10-01-2019</td>
						  <td>R$: 100,00</td>
						</tr>
						<tr>
						  <td>Farmácia</td>
						  <td>10-01-2019</td>
						  <td>R$: 100,00</td>
						</tr>
						<tr>
						  <td>Farmácia</td>
						  <td>10-01-2019</td>
						  <td>R$: 100,00</td>
						</tr>
						<tr>
						 <td>Farmácia</td>
						  <td>10-01-2019</td>
						  <td>R$: 100,00</td>
						</tr>
						<tr>
						  <td>Farmácia</td>
						  <td>10-01-2019</td>
						  <td>R$: 100,00</td>
						</tr>
						<tr>
						  <td>Farmácia</td>
						  <td>10-01-2019</td>
						  <td>R$: 100,00</td>
						</tr>
					  </table>
					</div>
					
					

				</div>

				<div class="box2">
					<div class="boxdespesas">
						<h2 class="titledespesas">Últimas 5 despesas
							<input type="button" class="btndespesas" value="Detalhes" onclick="detalhesdespesas();">
						</h2>
						
						<table class="tabledespesas">
							<tr>
							  <th>Título</th>
							  <th>Data</th>
							  <th>Valor</th>
							</tr>
							<tr>
							  <td>Farmácia</td>
							  <td>10-01-2019</td>
							  <td>R$: 100,00</td>
							</tr>
							<tr>
							  <td>Farmácia</td>
							  <td>10-01-2019</td>
							  <td>R$: 100,00</td>
							</tr>
							<tr>
							  <td>Farmácia</td>
							  <td>10-01-2019</td>
							  <td>R$: 100,00</td>
							</tr>
							<tr>
							 <td>Farmácia</td>
							  <td>10-01-2019</td>
							  <td>R$: 100,00</td>
							</tr>
							<tr>
							  <td>Farmácia</td>
							  <td>10-01-2019</td>
							  <td>R$: 100,00</td>
							</tr>
							<tr>
							  <td>Farmácia</td>
							  <td>10-01-2019</td>
							  <td>R$: 100,00</td>
							</tr>
						  </table>
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