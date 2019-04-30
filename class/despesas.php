<?php

class despesas{

    public function adicionar_despesa($valordespesa, $nomedespesa, $datadespesa, $chavenfe){
         global $conn;

           $sql = $conn->prepare("INSERT INTO despesas (nome_despesa, valor_despesa, data_despesa, chavenfe) 
            VALUES (:nomedespesa, :valordespesa, :datadespesa, :chavenfe)");
          $sql->bindValue(":nomedespesa", $nomedespesa);
          $sql->bindValue(":valordespesa", $valordespesa);
          $sql->bindValue(":datadespesa", $datadespesa);
          $sql->bindValue(":chavenfe", $chavenfe);
          $sql->execute();
          return true; //cadastrado com sucesso         
    }

    public function remover_despesa(){

    }

    public function alterar_despesa(){

    }

    public function ultimas_5_despesas(){
        global $conn;
         
        $sql = $conn->prepare("SELECT nome_despesa, valor_despesa, DATE_FORMAT (data_despesa, '%d-%m-%Y') as data_despesa
        FROM despesas ORDER BY data_insercao DESC LIMIT 5");
        $sql->execute();
        $tabela = $sql->fetchAll();//transforma os dados do banco em array com os nomes das colunas
        
        echo "<table  class='tabledespesas'>";
        echo "<th>Titulo</th>";
        echo "<th>Valor</th>";
        echo "<th>Data</th>";
        
        
          for($i=0; $i<count($tabela);$i++){
              echo "<tr>";
              for($j=0; $j<3;$j++){
                 echo "<td>".$tabela[$i][$j]."</td>";
              }
              echo "</tr>";
          }
          echo "</table>";
        return true; //ou $tabela


    }

    public function soma_total_despesas(){
      global $conn;
         
        $sql = $conn->prepare("SELECT SUM(valor_despesa) as vtdespesas FROM despesas");
        $sql->execute();
        $resultado = $sql->fetch();
        $soma = $resultado['vtdespesas'];
        echo "Contas a pagar<br>";
        echo number_format($soma, 2, '.', '.');
        return true;
    }
    





}



?>