<?php

//Chama a conexão com o banco de dados.
require_once("model/Conection.php");

class selectCores{

    public $id;
    public $cor;
 
    public function SelectCor (){

        //Instancia um objeto da classe conexão.
        $Conection = new Conection();
        $Conection->Conecta();

        $sql = $Conection->conexao->query("SELECT idprod FROM produtos");
        $this->id = array($sql->fetchAll(\PDO::FETCH_COLUMN));

        $sql2 = $Conection->conexao->query("SELECT cor FROM produtos");
        $this->cor = array($sql2->fetchAll(\PDO::FETCH_COLUMN));

        $count = $sql->rowCount($sql);
   
        echo "<select id = 'select' onchange = 'execute()'> ";
        echo "<option> Selecionar </option>";
        foreach($this->cor as $cores){
        foreach($this->id as $ids){
            for($i = 0; $i <= $count-1; $i++){
                echo "<option value = '$ids[$i]'> $cores[$i] </option>";
            }
        }
    }
        echo "</select>";
    }
}

$execute = new selectCores();
$execute->SelectCor();

?>