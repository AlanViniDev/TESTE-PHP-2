<?php

//Chama a conexão com o banco de dados.
require_once("Conection.php");

//Classe de salvar.
class Insert
{
    public function SalvarProduto(){

        //Instancia um objeto da classe conexão.
        $Conection = new Conection();
        $Conection->Conecta();

        //Instancia um objeto da classe dadosProdutos
        $dados = new dadosProdutos();
        $dados->requestProdutos();

        //Insere o registro produtos no banco de dados.
        $sql = ("INSERT INTO produtos (idprod,nome,cor,preco)
        VALUES ('".$dados->idprod."', '".$dados->nome."', '".$dados->cor."', '".$dados->preco."' )");

       if($Conection->conexao->query($sql)){
           echo "Dados inseridos com sucesso!";
       }
       else{
           echo "Erro ao inserir no banco de dados!";
       }
    }

}