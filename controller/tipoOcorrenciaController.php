<?php
if(!file_exists("../models/TipoOcorrencia.php"))
{include_once "models/TipoOcorrencia.php";}
else{
    include_once "../models/TipoOcorrencia.php";}

if(isset($_REQUEST["inserir"]))
{
    $tipoOcorrencia = new TipoOcorrencia();
    $tipoOcorrencia->tipo = $_REQUEST["txtTipo"];
    $tipoOcorrencia->tempMax = $_REQUEST["txtTempMin"];
    $tipoOcorrencia->tempMin = $_REQUEST["txtTempMax"];
    $result = "";
    if($tipoOcorrencia->tipo != "")
    {
        $result = $tipoOcorrencia->inserir($tipoOcorrencia);
    }
    header("location:../tipoOcorrencia.php?r=$result");
}
else if(isset($_REQUEST["alterar"]))
{
    $tipoOcorrencia = new TipoOcorrencia();
    $tipoOcorrencia->tipo = $_REQUEST["txtTipo"];
    $tipoOcorrencia->tempMax = $_REQUEST["txtTempMin"];
    $tipoOcorrencia->tempMin = $_REQUEST["txtTempMax"];
    $tipoOcorrencia->id = $_REQUEST["id"];
    $result = "";
    if($tipoOcorrencia->tipo != "")
    {
        $result = $tipoOcorrencia->alterar($tipoOcorrencia);
    }
    header("location:../tipoOcorrencia.php?r=$result");
}
else if(isset($_REQUEST["excluir"])){

    $tipoOcorrencia = new TipoOcorrencia();
    $result = 0;

    if(isset($_POST["ids"]))
    {
        foreach($_POST["ids"] as $check=>$value)
        {
            $tipoOcorrencia->id = $value;
            $result = $tipoOcorrencia->excluir($tipoOcorrencia->id);
        }
    }
    header("location:../tipoOcorrencia.php?r=$result");
}

class tipoOcorrenciaController
{
    function __construct(){
    }

    function retornaTodos()
    {
        $tipoOcorrencia = new TipoOcorrencia();
        return $tipoOcorrencia->consultarTodos();
    }

    function retorna($id)
    {
        $tipoOcorrencia = new TipoOcorrencia();
        return $tipoOcorrencia->consultar($id);
    }
}

?>