<?php

class Usuario {
    
    private $conn;
    public $msgErro = "";
    
    public function conectar($db, $host, $user, $password){

        global $conn;

        try {
            $conn = new PDO("mysql:host=$host; dbname=$db", $user, $password);
            return array("conexao" => $conn, "mensagem" => "Conectado no banco com sucesso");
        } catch (PDOException $e) {
            return array("conexao" => null, "mensagem" => "Ocorreu o erro ao se conectar:<br>" . $e->getMessage());
        }

    }

    public function cadastro_usuario($usuario, $email, $senha){
        global $conn;
        //verificar se o nome ja tem cadastro
        //se nao cadastrar
        $sql = $conn->prepare("SELECT id_usuario FROM usuarios
        WHERE usuario = :u");
        $sql->bindValue(":u", $usuario);
        $sql->execute();
        if($sql->rowCount() > 0){//conta as linhas
            return false; //ja esta cadastrado no banco
        } else{ //cadastrando no banco
            $sql = $conn->prepare("INSERT INTO usuarios (usuario, email, senha) 
            VALUES (:u, :e, :s)");
          $sql->bindValue(":u", $usuario);
          $sql->bindValue(":e", $email);
          $sql->bindValue(":s", md5($senha));
          return true; //cadastrado com sucesso         
        }

    }

    public function login($usuario, $senha){
        global $conn;
        //verificar se o usuario ja esta cadastrado, caso sim

        $sql = $conn->prepare("SELECT id_usuario FROM usuarios
        WHERE usuario = :u AND senha = :s");
        $sql->bindValue(":u", $usuario);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            //entrando no sistema
            $dados = $sql->fetch();//transforma os dados do banco em array
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            return true; //usuario logado com sucesso

        } else{
            return false; //nao foi possivel logar
        }


    }
    
}


?>