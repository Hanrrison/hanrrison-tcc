<?php


 class receitas {

    public function adicionar_receita($valorreceita, $nomereceita, $datareceita){

        global $conn;

        // $sql = $conn->prepare("SELECT id_usuario FROM usuarios
        // WHERE id_usuario = ".$_SESSION['id_usuario']." ");
        // $sql->execute();
        $id_usuario = $_SESSION['id_usuario'];


        $sql = $conn->prepare("INSERT INTO receitas (id_usuario, nome_receita, valor_receita, data_receita) 
         VALUES ($id_usuario, :nomereceita, :valorreceita, :datareceita)");
       $sql->bindValue(":nomereceita", $nomereceita);
       $sql->bindValue(":valorreceita", $valorreceita);
       $sql->bindValue(":datareceita", $datareceita);
       $sql->execute();
       return true; //cadastrado com sucesso         




        // $sql = $strcon->query('SELECT cd_aluno FROM tb_aluno WHERE cd_rm_aluno = ' . $_SESSION['aluno'] );
        // $row = $sql->fetch_assoc();
        // $strcon->query( 'INSERT INTO item_workshop_aluno(cd_workshop, cd_aluno) VALUES (1, ' . $row['cd_aluno'] . ' )' );
    
    }

    public function remover_receita(){

    }

    public function alterar_receita(){

    }

    public function ultimas_5_receitas(){
      global $conn;
       
      $id_usuario = $_SESSION['id_usuario'];

      $sql = $conn->prepare("SELECT nome_receita, valor_receita, DATE_FORMAT (data_receita, '%d-%m-%Y') as data_receita
      FROM receitas WHERE id_usuario = $id_usuario ORDER BY data_receita DESC LIMIT 5");
      $sql->execute();
      $tabela = $sql->fetchAll();//transforma os dados do banco em array com os nomes das colunas
     
      echo "<table  class='tablerendas'>";
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

  public function soma_total_receitas(){
    global $conn;
       
    $id_usuario = $_SESSION['id_usuario'];

      $sql = $conn->prepare("SELECT SUM(valor_receita) as vtreceitas FROM receitas WHERE id_usuario = $id_usuario");
      $sql->execute();
      $resultado = $sql->fetch();
      $soma = $resultado['vtreceitas'];
      echo "Contas a receber<br>";
      echo number_format($soma, 2, '.', '.');
      return true;
  }


  public function todasreceitas(){
    global $conn;
     
    $id_usuario = $_SESSION['id_usuario'];

    $sql = $conn->prepare("SELECT nome_receita, valor_receita, DATE_FORMAT (data_receita, '%d-%m-%Y') as data_receita
    FROM receitas WHERE id_usuario = $id_usuario ORDER BY data_receita DESC");
    $sql->execute();
    $tabela = $sql->fetchAll();//transforma os dados do banco em array com os nomes das colunas
   
    echo "<table  class='tablerendas'>";
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



 }









?>