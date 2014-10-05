<?php
if(!file_exists("../models/TipoProduto.php"))
    include_once "models/TipoProduto.php";
else
    include_once "../models/TipoProduto.php";

if(isset($_REQUEST["op"]))
{
    if($_REQUEST["op"] == "inserir")
    {
        $tipoProduto = new TipoProduto();
        $tipoProduto->especial = $_REQUEST["txtEspecial"];
        $tipoProduto->nome = $_REQUEST["txtNome"];
        $tipoProduto->status = $_REQUEST["status"];
        $result = "";
        if($tipoProduto->tipo != "")
        {
            $result = $tipoProduto->inserir($tipoProduto);
        }
        header("location:../tipoProduto.php?r=$result");
    }
    else if($_REQUEST["op"] == "alterar")
    {
        $tipoProduto = new TipoProduto();
        $tipoProduto->tipo = $_REQUEST["txtEspecial"];
        $tipoProduto->tempMax = $_REQUEST["txtNome"];
        $tipoProduto->tempMin = $_REQUEST["status"];
        $tipoProduto->id = $_REQUEST["id"];
        $result = "";
        if($tipoProduto->tipo != "")
        {
            $result = $tipoProduto->alterar($tipoProduto);
        }
        header("location:../tipoProduto.php?r=$result");
    }
    else if($_REQUEST["op"] == "excluir"){

        $tipoProduto = new TipoProduto();
        $tipoProduto->id = $_REQUEST["id"];
        $result = $tipoProduto->excluir($tipoProduto->id);
        header("location:../tipoProduto.php?r=$result");
    }

}



class tipoProdutoController
{
    function __construct(){
    }

    function retornaTodos()
    {
        $tipoProduto = new TipoProduto();
        return $tipoProduto->consultarTodos();
    }

    function retorna($id)
    {
        $tipoProduto = new TipoProduto();
        return $tipoProduto->consultar($id);
    }
}

?>