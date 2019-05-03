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

    // public function login($usuario, $senha){
    //     global $conn;
    //     //verificar se o usuario ja esta cadastrado, caso sim

    //     $sql = $conn->prepare("SELECT id_usuario FROM usuarios
    //     WHERE usuario = :usuario AND senha = :senha");
    //     $sql->bindValue(":usuario", $usuario);
    //     $sql->bindValue(":senha", md5($senha));
    //     $sql->execute();
    //     if($sql->rowCount() > 0){//entrando no sistema
    //         $dados = $sql->fetch();//transforma os dados do banco em array com os nomes das colunas
    //             // session_start();
    //             // echo $_SESSION['id_usuario'] = $dados['id_usuario'];   
    //             // header('location:home.php');       
    //         return true; //usuario logado com sucesso
    //     } else{
    //         return false; //nao foi possivel logar
    //     }
        
    // }
    
}


?>