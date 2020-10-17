<?php

//Chama a conexão com o banco de dados.
require_once("Conection.php");

//Classe de atualizar.
class Update
{
    public function AtualizarProduto(){

        //Instancia um objeto da classe conexão.
        $Conection = new Conection();
        $Conection->Conecta();

        //Instancia um objeto da classe dadosProdutos
        $dados = new UpdateProdutos();
        $dados->requestProdutos();

        //Atualiza o registro produtos no banco de dados.
        $sql = ("UPDATE produtos SET idprod = '".$dados->idprod."', nome = '".$dados->nome."',
        cor = '".$dados->cor."', preco = '".$dados->preco."' WHERE idprod = '".$dados->idprod."' ");

       if($Conection->conexao->query($sql)){
           echo "Dados Atualizados com sucesso!";
       }
       else{
           echo "Erro ao atualizar registro!";
       }
    }
}