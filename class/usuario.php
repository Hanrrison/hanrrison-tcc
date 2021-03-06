<?php


class Usuario {



    public function cadastro_usuario($usuario, $email, $senha){
        global $conn;
        //verificar se o nome ja tem cadastro
        //se nao cadastrar
        $sql = $conn->prepare("SELECT id_usuario FROM usuarios
        WHERE usuario = :usuario");
        $sql->bindValue(":usuario", $usuario);
        $sql->execute();
        if($sql->rowCount() > 0){//conta as linhas
            return false; //ja esta cadastrado no banco
        } else{ //cadastrando no banco
            $sql = $conn->prepare("INSERT INTO usuarios (usuario, email, senha) 
            VALUES (:usuario, :email, :senha)");
          $sql->bindValue(":usuario", $usuario);
          $sql->bindValue(":email", $email);
          $sql->bindValue(":senha", md5($senha));
          $sql->execute();
          return true; //cadastrado com sucesso         
        }

    }



    public function conta_usuario($conta, $saldo, $tipodeconta){
        global $conn;

        $id_usuario = $_SESSION['id_usuario'];

        $sql = $conn->prepare("INSERT INTO contas (id_usuario, conta, saldo, tipodeconta) 
         VALUES ($id_usuario, :conta, :saldo, :tipodeconta)");
       $sql->bindValue(":conta", $conta);
       $sql->bindValue(":saldo", $saldo);
       $sql->bindValue(":tipodeconta", $tipodeconta);
       $sql->execute();
       return true;

    }

    public function saldo_usuario(){
        global $conn;

        $id_usuario = $_SESSION['id_usuario'];

        $sql = $conn->prepare("SELECT SUM(saldo) as vtsaldo FROM contas WHERE id_usuario = $id_usuario");
        $sql->execute();
        $resultado = $sql->fetch();
        $soma = $resultado['vtsaldo'];
        echo "Saldo<br>";
        echo number_format($soma, 2, '.', '.');
        return true;

    }

    public function classificacao($classificacao){
        global $conn;

        $id_usuario = $_SESSION['id_usuario'];
        $sql = $conn->prepare("INSERT INTO classificacao (id_usuario, classificacao) 
        VALUES ($id_usuario, :classificacao)");
      $sql->bindValue(":classificacao", $classificacao);
      $sql->execute();
      return true;

    }

    public function tipoclassificacao(){
        global $conn;

        $id_usuario = $_SESSION['id_usuario'];
        $sql = $conn->prepare("SELECT classificacao FROM classificacao WHERE id_usuario = $id_usuario");
      $sql->execute();
      $classificacoes = $sql->fetchAll();   

      $arrayclassificacao = array_column($classificacoes, 'classificacao');
        
      foreach($arrayclassificacao as $nomeclassificacao){
            echo "<option>" .$nomeclassificacao."</option>";
            echo "<br>";
        }
    }

    public function tipoconta(){
        global $conn;

        $id_usuario = $_SESSION['id_usuario'];
        $sql = $conn->prepare("SELECT conta FROM contas WHERE id_usuario = $id_usuario");
      $sql->execute();
      $contas = $sql->fetchAll();   

      $arraycontas = array_column($contas, 'conta');
        
      foreach($arraycontas as $nomecontas){
            echo "<option>" .$nomecontas."</option>";
            echo "<br>";
        }


    }
    

      

}


?>