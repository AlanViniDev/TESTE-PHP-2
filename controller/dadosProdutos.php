<?php

//Requisição do modelo.
require("../model/Insert.php");

//classe de requisição.
class dadosProdutos{

    //Atributos.
    public $idprod;
    public $nome;
    public $cor;
    public $preco;

    // Pega os valores do formulario.
    public function requestProdutos(){
        $this->idprod = $_POST['idprod'];
        $this->nome = $_POST['nome'];
        $this->cor = $_POST['cor'];
        $this->preco = $_POST['preco'];
    }

    //Instancia o objeto do model salvar e executa o método.
    public function Salvar(){
        $salvar = new Insert();
        $salvar->SalvarProduto();
    }
}

// Instancia os objetos e executa o método.
$execute = new dadosProdutos();
$execute->requestProdutos();
$execute->Salvar();