<?php

// cabeçalho.
header('Content-Type: text/html; iso-8859-1;charset:utf-8;');

// conexão com banco de dados.
require_once("Conection.php");

//requisição post.
$produto = $_POST['produto'];

//Instancia um objeto da classe conexão.
 $Conection = new Conection();
 $Conection->Conecta();

// se a variavel produto estiver preenchida o algoritimo realiza o select se não houver atribui 0.
if(!empty($produto)){
    
    $sql = $Conection->conexao->query("SELECT idprod FROM produtos where nome LIKE '%$produto%' ");
    $idprod = array($sql->fetch(\PDO::FETCH_COLUMN));
    
    $sql = $Conection->conexao->query("SELECT nome FROM produtos where nome LIKE '%$produto%'  ");
    $nome = array($sql->fetch(\PDO::FETCH_COLUMN));
    
    $sql = $Conection->conexao->query("SELECT preco FROM produtos where nome LIKE '%$produto%'  ");
    $preco = array($sql->fetch(\PDO::FETCH_COLUMN));

    $sql = $Conection->conexao->query("SELECT cor FROM produtos where nome LIKE '%$produto%'  ");
    $cor = array($sql->fetch(\PDO::FETCH_COLUMN));
    
    $count = array($sql->rowCount(\PDO::FETCH_ASSOC));
    
    //Lista.
    echo "ID: " . implode($idprod) . "</br>";
    echo "Nome: " . implode($nome) . "</br>";
    echo "Preco: " . implode($preco) . "</br>";
    echo "Cor: " . implode($cor) . "</br>";

    // se o nome não existir retorna a frase: Nao foram encontrados registros com esta palavra.
    if(implode($count) == 0){
        $count = 0;
    }
   
}

// Se  a variavel produto estiver vazia atribui 0 e retorna a frase: Nao foram encontrados registros com esta palavra.
else{
    $count = 0;
}

?>