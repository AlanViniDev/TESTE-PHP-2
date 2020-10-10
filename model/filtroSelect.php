<?php

//Chama a conexão com o banco de dados.
require_once("Conection.php");

class filtroSelect{

    public $produto;

    public function Select(){

        //Instancia um objeto da classe conexão.
        $Conection = new Conection();
        $Conection->Conecta();

        //Pega um valor como parametro esse valor e o id da cor.
        @$param = $_POST['param'];
        $param = json_decode($param, true);

        $sql = $Conection->conexao->query("SELECT idprod FROM produtos WHERE idprod LIKE '%$param%' ");
        $this->idprod= array($sql->fetch(\PDO::FETCH_COLUMN));

        $sql = $Conection->conexao->query("SELECT nome FROM produtos WHERE idprod LIKE '%$param%' ");
        $this->nome = array($sql->fetch(\PDO::FETCH_COLUMN));

        $sql = $Conection->conexao->query("SELECT cor FROM produtos WHERE idprod LIKE '%$param%' ");
        $this->cor = array($sql->fetch(\PDO::FETCH_COLUMN));

        $sql = $Conection->conexao->query("SELECT preco FROM produtos WHERE idprod LIKE '%$param%' ");
        $this->preco = array($sql->fetch(\PDO::FETCH_COLUMN));

        foreach($this->idprod as $idprods){
           echo ("ID: " . $idprods . " , ");
        }

        
        foreach($this->nome as $nomes){
            echo ("Produto: " . $nomes . " , ");
         }

         
        foreach($this->cor as $cores){
            echo ("Cor: " . $cores . " , ");
         }

         
        foreach($this->preco as $precos){
            echo ("Preco: " . $precos . " . ");
         }

    }

}

$execute = new filtroSelect();
$execute->Select();
?>