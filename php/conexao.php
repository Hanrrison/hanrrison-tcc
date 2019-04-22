<?php
	
class conexao{

	public function getConnection() {

		global $conn;

		$host = "alv4v3hlsipxnujn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
		$db = "a5cs5fjis77aj3b5";
		$user = "lwk8f7zk8565v63f";
		$password = "z9zpne3a9ulmh9hg";

		try {
			$conn = new PDO("mysql:host=$host; dbname=$db", $user, $password);
			return array("conexao" => $conn, "mensagem" => "Conectado no banco com sucesso");
		} catch (PDOException $e) {
			return array("conexao" => null, "mensagem" => "Ocorreu o erro ao se conectar:<br>" . $e->getMessage());
		}
	}

	

}


	
?>