<?php


 class receitas {

    public function adicionar_receita($valorreceita, $nomereceita, $datareceita){

        global $conn;

        $sql = $conn->prepare("INSERT INTO receitas (nome_receita, valor_receita, data_receita) 
         VALUES (:nomereceita, :valorreceita, :datareceita)");
       $sql->bindValue(":nomereceita", $nomereceita);
       $sql->bindValue(":valorreceita", $valorreceita);
       $sql->bindValue(":datareceita", $datareceita);
       $sql->execute();
       return true; //cadastrado com sucesso         
    
    }

    public function remover_receita(){

    }

    public function alterar_receita(){

    }



 }









?>