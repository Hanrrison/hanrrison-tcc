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

	
	<link rel="stylesheet" href="../css/contas.css">


	<title>Bem vindo a home</title>


</head>

<body>
	<!-- Conteúdo -->

	<header class="header">
		<img height="100%" id="logo" src="http://www.chicledigital.com.br/wp-content/uploads/criacao-de-logotipo.png">
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
					<a href="#">Cadastro de Classificação</a>
					<a href="contas.php">Cadastro de Contas</a>
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
			<h2>Cadastro de Contas</h2>
		</div>



		<div class="info">
			<div class="wrapper">
				<div class="box">


					
		<div class="infocards">
			<div class="infocardswrap">
				<div class="cards">
						<div class="item">
							<input type="button" class="btnadd" value="Novo" onclick="detalhesdespesas();">
						</div>
				</div>

				<div class="cards">
						<div class="item">
							<input type="button" class="btncancelar" value="Cancelar" onclick="detalhesdespesas();">
					</div>
				</div>

				<div class="cards">
						<div class="item">
							<input type="button" class="btnalterar" value="Alterar" onclick="detalhesdespesas();">
					</div>
				</div>

				<div class="cards">
						<div class="item">
							<input type="button" class="btnpesquisar" value="Pesquisar" onclick="detalhesdespesas();">
					</div>
				</div>
			</div>
		</div>


					<form method="POST">
						<fieldset>
                            
							<input type="text" size="10" name="conta" placeholder="Conta">
                            <input type="text" size="10" name="saldo" placeholder="Saldo">
                          

                            <label>Tipo
							<select name="tipodeconta">
								<option value=""><span>Tipo de conta</span></option>
								<option name="Carteira">Carteira</option>
                                <option name="Conta Corrente">Conta Corrente</option>
                                <option name="Poupanca">Poupança</option>
                                <option name="Outros">Outros</option>
							</select></label><br>

							<input type ="submit" value="confirmarconta">

						</fieldset>
					</form>

					<?php
					
					if(isset($_POST['conta']) && isset($_POST['saldo']) && isset($_POST['tipodeconta'])){
						$conta = addslashes($_POST['conta']);
						$saldo = addslashes($_POST['saldo']);
						$tipodeconta = addslashes($_POST['tipodeconta']);

						if(empty($conta) && empty($saldo) && empty($tipodeconta)){
							echo "<script>alert('Preencha todos os dados');</script>";
						}else{
							if(empty($conta)){
								echo "<script>alert('Preencha o nome da conta');</script>";
							}else{
								if(empty($saldo)){
									echo "<script>alert('Preencha o saldo');</script>";
								}else{
									if(empty($tipodeconta)){
										echo "<script>alert('Preencha o tipo da conta');</script>";
									}
								}
							}
						}

						if(!empty($conta) && !empty($saldo) && !empty($tipodeconta)){
										
							$conn = new conexao;
							$conn->getConnection();

								if ($usuario->conta_usuario($conta, $saldo, $tipodeconta)) {
										echo "<script>alert('Conta cadastrada com sucesso!');</script>";
								}

						}

					}


					
					
					?>

				</div>


				<!--		
				<div class="box2">
					<div class="boxtitle">
						<h2>Graficos
						<input type="button" class="button" value="Detalhes"></h2>
					</div>
					<br>
					Área destinada aos gráficos do sistema
					
				</div>

				<div class="box3">
					<h2>Financeiro</h2>
					<p>Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
					</p>
				</div>



				<div class="box3">
					<h2>Financeiro</h2>
					<p>Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
					</p>
				</div>


				<div class="box2">
					<div class="boxtitle">
						<h2>Graficos
						<input type="button" class="button" value="Detalhes"></h2>
					</div>
					<br>
					Área destinada aos gráficos do sistema
					
				</div>


				<div class="box2">
					<div class="boxtitle">
						<h2>Graficos
						<input type="button" class="button" value="Detalhes"></h2>
					</div>
					<br>
					Área destinada aos gráficos do sistema
					
				</div>

				<div class="box2">
					<div class="boxtitle">
						<h2>Graficos
						<input type="button" class="button" value="Detalhes"></h2>
					</div>
					<br>
					Área destinada aos gráficos do sistema
					
				</div>

				<div class="box2">
					<div class="boxtitle">
						<h2>Graficos
						<input type="button" class="button" value="Detalhes"></h2>
					</div>
					<br>
					Área destinada aos gráficos do sistema
					
				</div>

				<div class="box3">
					<h2>Financeiro</h2>
					<p>Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
							Area destinada para um livre resumo do financeiro, 
					</p>
				</div>

				




				Continuação......
			</div>
		</div>


-->






			</div>


			<footer class="rodape">
				Todos os direitos reservados
			</footer>


</body>

</html>