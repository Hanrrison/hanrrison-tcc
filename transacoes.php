<!DOCTYPE html>

<?php
	require_once 'php/conexao.php';
	require_once 'class/importaxml.php';
	require_once 'class/despesas.php';
	require_once 'class/receitas.php';
	$importaxml = new importaxml;
	$despesa = new despesas;
	$receita = new receitas;
	$conn = new conexao;
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

									<input type="text" size="10" name="valorreceita" placeholder="R$: 0.00">
									<input type="text" name="datareceita" placeholder="DD/MM/YYYY" value="<?php echo date("d/m/Y");?>"><br>
									<input type="text" name="nomereceita" placeholder="Nome">
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
							<?php
								if(isset($_POST['valorreceita']) && isset($_POST['datareceita']) && isset($_POST['nomereceita'])){
									$valorreceita = addslashes($_POST['valorreceita']);
									$datareceita = addslashes($_POST['datareceita']);
									$nomereceita = addslashes($_POST['nomereceita']);

									$datareceita = implode('-', array_reverse(explode('/', "$datareceita"))); //realiza conversao para db mysql

									if(!empty($valorreceita) && !empty($datareceita) && !empty($nomereceita)){
										
										$conn->getConnection();

											if ($receita->adicionar_receita($valorreceita, $nomereceita, $datareceita)) {
													echo "<script>alert('Receita cadastrada!');</script>";
											}

									}


								}

							?>

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
										
										<label for="import-arquivo">Importar XML</label>
										<input id="import-arquivo" type='file' name="impxml" accept=".xml" >
											<?php

												$importacao = $importaxml->entradaxml();
												
												$teste = $importacao[0];
												$valordanfe = $teste[0]; //valor

												$dh = $importacao[1];
												$datadanfe = $dh[0]; //data


												$dataconvertida = $datadanfe; //variavel dataconvertida para formatar a string em date
												$date = new DateTime($dataconvertida);
												
											?>

										<label for="submit-arquivo">Confirmar XML</label>
										<input type="submit" id="submit-arquivo" name="confirmaxml" value="Confirmar Importação"><br>		
										
									
									<input type="text" size="10" name="valordespesa" placeholder="R$: 0.00" value="<?php echo $valordanfe;?>">
									<input type="text" name="datadespesa" placeholder="DD/MM/YYYY" value="<?php echo $date->format('d/m/Y');?>"><br>

									<input type="text" name="nomedespesa" placeholder="Nome">
									<select name="classificacao">
										<option value="">Selecione a Classificação</option>
										</select>
									<select name="conta">
										<option value="">Selecione a Conta</option>
										</select>
										
										<div class="submitdespesas">
											<input type ="submit" class="btndespesa" name="confirmadespesa" value="Confirmar Despesa">
										</div>
								</form>
								<?php
									//criar a conexao no banco e gravar os dados

								if (isset($_POST['valordespesa']) && isset($_POST['nomedespesa']) && isset($_POST['datadespesa'])) {
										$valordespesa = addslashes($_POST['valordespesa']);
										$nomedespesa = addslashes($_POST['nomedespesa']);
										$datadespesa = addslashes($_POST['datadespesa']);
										$datadespesa = implode('-', array_reverse(explode('/', "$datadespesa"))); //realiza conversao para db mysql


										if (!empty($valordespesa) && !empty($nomedespesa) && !empty($datadespesa)) {
											//conecta no banco de dados
											$conn->getConnection();

											//criar verificacao para os dados nao estarem vazios
											
											if ($despesa->adicionar_despesa($valordespesa, $nomedespesa, $datadespesa)) {
												echo "<script>alert('Despesa cadastrada!');</script>";
											}

										}
									} 


								?>

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