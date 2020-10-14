<?php

//Requisição do modelo.
require("../model/Delete.php");

//classe de requisição.
class ExcluirProdutos{

    //Atributo.
    public $idprod;

    // Pega o id informado.
    public function requestID(){
        $this->idprod = $_POST['idprodExcluir'];
    }

    //Instancia o objeto do model delete e executa o método.
    public function Excluir(){
        $excluir = new Delete();
        $excluir->ExcluirProduto();
    }
}

// Instancia os objetos e executa o método.
$execute = new ExcluirProdutos();
$execute->requestID();
$execute->Excluir();