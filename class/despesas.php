<?php

class despesas{

    public function adicionar_despesa($valordespesa, $nomedespesa, $datadespesa, $chavenfe){
         global $conn;

         $id_usuario = $_SESSION['id_usuario'];

           $sql = $conn->prepare("INSERT INTO despesas (id_usuario, nome_despesa, valor_despesa, data_despesa, chavenfe) /*pegar id da sessao*/
            VALUES ($id_usuario, :nomedespesa, :valordespesa, :datadespesa, :chavenfe)");
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
         
        $id_usuario = $_SESSION['id_usuario'];

        $sql = $conn->prepare("SELECT nome_despesa, valor_despesa, DATE_FORMAT (data_despesa, '%d-%m-%Y') as data_despesa
        FROM despesas WHERE id_usuario = $id_usuario ORDER BY data_insercao DESC LIMIT 5");
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
         
      $id_usuario = $_SESSION['id_usuario'];

        $sql = $conn->prepare("SELECT SUM(valor_despesa) as vtdespesas FROM despesas WHERE id_usuario = $id_usuario");
        $sql->execute();
        $resultado = $sql->fetch();
        $soma = $resultado['vtdespesas'];
        echo "Contas a pagar<br>";
        echo number_format($soma, 2, '.', '.');
        return true;
    }
    





}



?>