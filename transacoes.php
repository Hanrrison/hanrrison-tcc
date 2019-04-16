<!DOCTYPE html>

<?php
	require_once 'php/conexao.php';
?>


<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/transacoes.css">


	<title>Bem vindo a home</title>


</head>

<body>
	<!-- Conteúdo -->

	<header class="header">
		<img height="100%" id="logo" src="http://www.chicledigital.com.br/wp-content/uploads/criacao-de-logotipo.png">
		<div class="login">
			SAIR
		</div>
	</header>

	<nav id="menu">
		<ul>
			<li><a href="../html/home.html">Dashboard</a></li>
			<li><a href="../html/transacoes.html">Transações</a></li>
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
			<h2>Transações</h2>
		</div>
		

		<div class="info">
			<div class="wrapper">
				
				<div class="box">
					<div class="boxrendas">
						<h2 class="titlerendas">Receitas</h2>
						
						<div class="receitas">
							<form method="POST">

									<input type="text" size="10" placeholder="R$: 0.00">
									<input type="text" placeholder="DD/MM/YYYY"><br>
									<input type="text" placeholder="Nome">
									<select name="classificacao">
										<option value="">Selecione a Classificação</option>
										</select>
									<select name="conta">
										<option value="">Selecione a Conta</option>
										</select>

										<div class="submitreceitas">
											<input type ="submit" class="btnreceita" value="Confirmar Receita">
										</div>

							</form>
						</div>

				

					</div>

					<br>

					<div class="boxrendas">
						<h2 class="titlerendas">Últimas 5 rendas
							<input type="button" class="btnrendas" value="Detalhes" onclick="detalhesrenda();">
						</h2>
						<br>
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
						<h2 class="titledespesas">Despesas</h2>

						<div class="despesas">
								<form method="POST" enctype="multipart/form-data">
										
										<label for='import-arquivo'>Importar XML</label>
										<input id='import-arquivo' type='file' accept=".xml" name="doc">
											<?php

												require_once 'entradaxml.php';
												
												$importaxml = new importaxml;
												get_class($importaxml);
												
												$variavel = $importaxml->entradaxml();
												
											$teste = $variavel[0];
											$teste2 = $teste[0];
										//	echo $teste2 . "<br>";
 
											$dh = $variavel[1];
											$dh2 = $dh[0];
											//echo $dh2;

											//echo "<script>alert('Arquivo importado!');</script>"

											?>

										<label for='submit-arquivo'>Confirmar XML</label>
										<input type="submit" id="submit-arquivo" value="Confirmar Importação"><br>		
										
									
									<input type="text" size="10" placeholder="R$: 0.00" value="<?php echo $teste2;?>">
									<input type="text" placeholder="DD/MM/YYYY" value="<?php echo date('d/m/Y', strtotime($dh2)); ?>"><br>

									<input type="text" placeholder="Nome">
									<select name="classificacao">
										<option value="">Selecione a Classificação</option>
										</select>
									<select name="conta">
										<option value="">Selecione a Conta</option>
										</select>
										
										<div class="submitdespesas">
											<input type ="submit" class="btndespesa" value="Confirmar Despesa">
										</div>
										

								</form>
							</div>
							
					
						
					</div>

					<br>

					<div class="boxdespesas">
						<h2 class="titledespesas">Últimas 5 despesas
							<input type="button" class="btndespesas" value="Detalhes" onclick="detalhesdespesas();">
						</h2>
						<br>
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