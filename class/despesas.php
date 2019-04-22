<?php

class despesas{

    public function adicionar_despesa($valordespesa, $nomedespesa, $datadespesa){
         global $conn;

           $sql = $conn->prepare("INSERT INTO despesas (nome_despesa, valor_despesa, data_despesa) 
            VALUES (:nomedespesa, :valordespesa, :datadespesa)");
          $sql->bindValue(":nomedespesa", $nomedespesa);
          $sql->bindValue(":valordespesa", $valordespesa);
          $sql->bindValue(":datadespesa", $datadespesa);
          $sql->execute();
          return true; //cadastrado com sucesso         
       

    }

    public function remover_despesa(){

    }

    public function alterar_despesa(){

    }





}



?>