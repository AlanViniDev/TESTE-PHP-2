<?php

// Requisição da classe responsável pela busca.
require("../Model/FiltroModel.php");

//Classe.
class Filtro{

    //Atributo.
    public $produto;

    //Método.
    public function ExecuteFiltro(){

       //requisição post.
       $this->produto = $_POST['produto'];

       // Instancia o objeto da classe modelo responsavel por buscar os dados.
       $filtrar = new FiltroModel();
       $filtrar->FiltroMod();
        
       //Lista.
       echo ($this->idprod);
       echo ($this->nome);
       echo ($this->preco);
       echo ($this->cor);
    }
}

//Instancia o objeto e executa o método.
$execute = new Filtro();
$execute->ExecuteFiltro();