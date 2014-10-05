<?php
if(!file_exists("../models/TipoVeiculo.php"))
    include_once "models/TipoVeiculo.php";
else
    include_once "../models/TipoVeiculo.php";

if(isset($_REQUEST["salvar"]))
{
    $tipoveiculo = new TipoVeiculo();
    $tipoveiculo->tipo = $_REQUEST["txtTipo"];
    $result = "";
    if($tipoveiculo->tipo != "")
    {
        $result = $tipoveiculo->inserir($tipoveiculo);
    }
    header("location:../tipoVeiculo.php?r=$result");
}
else if(isset($_REQUEST["alterar"]))
{
    $tipoVeiculo = new TipoVeiculo();
    $tipoVeiculo->tipo = $_REQUEST["txtTipo"];
    $tipoVeiculo->id = $_REQUEST["id"];
    $result = "";
    if($tipoVeiculo->tipo != "")
    {
        $result = $tipoVeiculo->alterar($tipoVeiculo);
    }
    header("location:../tipoVeiculo.php?r=$result");
}
else if(isset($_REQUEST["excluir"])){

    $tipoVeiculo = new TipoVeiculo();
    foreach($_REQUEST["ids"] as $ids=>$values)
    {
        echo $values;
        $result = $tipoVeiculo->excluir($values);
    }
    header("location:../tipoVeiculo.php?r=$result");
}


class tipoVeiculoController
{
    function __construct(){
    }

    function retornaTodos()
    {
        $tipoVeiculo = new TipoVeiculo();
        return $tipoVeiculo->consultarTodos();
    }

    function retorna($id)
    {
        $tipoVeiculo = new TipoVeiculo();
        return $tipoVeiculo->consultar($id);
    }
}

?>