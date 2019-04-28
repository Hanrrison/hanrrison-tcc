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

    public function ultimas_5_receitas(){
      global $conn;
       
      $sql = $conn->prepare("SELECT nome_receita, valor_receita, data_receita
      FROM receitas ORDER BY data_insercao DESC LIMIT 5");
      $sql->execute();
      $tabela = $sql->fetchAll();//transforma os dados do banco em array com os nomes das colunas
     
      echo "<table  class='tablerendas'>";
      echo "<th>Titulo</th>";
      echo "<th>Valor</th>";
      echo "<th>Data</th>";
      
      
        for($i=0; $i<count($tabela);$i++){
            echo "<tr>";
            for($j=0; $j<count($tabela[$i]);$j++){
               echo "<td>".$tabela[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
      return true; //ou $tabela


  }

 }









?>