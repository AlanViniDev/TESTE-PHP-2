<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chama a biblioteca jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="jquery.2.1.3.min.js"></script>
    <title>Teste com PHP</title>
</head>
<body>
<!-- Cadastrar Produto -->
<form method = "POST" action = "" name = "FormularioProdutos" >
    <h1> Cadastrar Produtos </h1>
    <input style = "margin:5px;" type = "text" placeholder = "ID" name = "idprod"/> <br/>
    <input style = "margin:5px;" type = "text" placeholder = "Produto" name = "nome"/> <br/>
    <input style = "margin:5px;" type = "text" placeholder = "cor" name = "cor"/> <br/>
    <input style = "margin:5px;" type = "text" placeholder = "Preco" name = "preco"/> <br/>

    <button style = "margin:5px;color:white;background-color:blue;" type = "submit"> Cadastrar </button>
    <button style = "margin:5px;color:white;background-color:green;" type = "submit"> Atualizar </button>
    <br/>
    <input style = "margin:5px;" placeholder = "ID" type = "text" name = "idprodExcluir" />
    <br/>
    <button style = "margin:5px;color:white;background-color:red;" type = "submit"> Excluir </button>
</form>

<!-- Filtrar por nome. -->

<div class="container">
<h1> Filtro de Produtos </h1>
<div class="row">
<div class="col-lg-3">
<div class="input-group">
<input type="text" class="form-control" id="produto" placeholder="Buscar por...">
<span class="input-group-btn">
<button class="btn btn-default" id="buscar" type="button">Buscar</button>
</span>
</div>
</div>
</div>
<div id="dados">Aqui será inserindo o resultado da consulta...</div>
</div>

<?php
/* Chama o select de cores via PHP. */
require("model/selectCores.php");
?>

<div id = "resultadoFiltro"></div>

</body>
</html>

<!-- Envia um parametro para requisicao dos dados do select e retorna o filtro. -->
<script type = "text/javascript">
function execute(){
    var param = document.getElementById("select").value;
    event.preventDefault();
    $.ajax({
        url: 'model/filtroSelect.php/',
        data: {param: param},
        type: 'POST',
        dataType: 'html',
        success: function (msg){
            document.getElementById("resultadoFiltro").innerHTML = msg;
        }
    });
};
</script>

<!--Ajax Create. -->
<script type = "text/javascript"> 
    $('form[name="FormularioProdutos"]').submit(function (event){
        event.preventDefault();
        $.ajax({
            url: "controller/dadosProdutos.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function (data){ 
            }
        });
    });
</script>

<!--Ajax Update. -->
<script type = "text/javascript"> 
    $('form[name="FormularioProdutos"]').submit(function (event){
        event.preventDefault();
        $.ajax({
            url: "controller/UpdateProdutos.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function (data){ 
            }
        });
    });
</script>

<!--Ajax Excluir. -->
<script type = "text/javascript"> 
    $('form[name="FormularioProdutos"]').submit(function (event){
        event.preventDefault();
        $.ajax({
            url: "controller/ExcluirProdutos.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function (data){ 
            }
        });
    });
</script>

<!-- Filtro com Ajax e PHP. -->
<script type = "text/javascript">
function buscar(produto) {
    //O método $.ajax(); é o responsável pela requisição
    $.ajax({
        //Configurações
        type: 'POST',//Método que está sendo utilizado.
        dataType: 'html',//É o tipo de dado que a página vai retornar.
        url: 'Model/FiltroModel.php',//Indica a página que está sendo solicitada.
        //função que vai ser executada assim que a requisição for enviada
        beforeSend: function () {
            $("#dados").html("Carregando...");
        },
        data: {produto: produto},//Dados para consulta
        //função que será executada quando a solicitação for finalizada.
        success: function (msg){
            $("#dados").html(msg);
        }
        });
}
$('#buscar').click(function () {
    buscar($("#produto").val())
});
</script>