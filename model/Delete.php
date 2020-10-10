<?php

//Chama a conexão com o banco de dados.
require_once("Conection.php");

//Classe de salvar.
class Delete
{
    public function ExcluirProduto(){

        //Instancia um objeto da classe conexão.
        $Conection = new Conection();
        $Conection->Conecta();

        //Instancia um objeto da classe excluir produtos.
        $dados = new ExcluirProdutos();
        $dados->requestID();

        //Deleta o registro no banco de dados.
        $sql = ("DELETE FROM produtos WHERE idprod = '".$dados->idprod."' ");

       if($Conection->conexao->query($sql)){
           echo "Dados Excluidos com sucesso!";
       }
       else{
           echo "Erro ao Excluir registro";
       }
    }
}