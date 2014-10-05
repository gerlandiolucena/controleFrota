<?php
if(!file_exists("../models/TipoContato.php"))
    include_once "models/TipoContato.php";
else
    include_once "../models/TipoContato.php";

if(isset($_REQUEST["salvar"]))
{
    $tipoContato = new TipoContato();
    $tipoContato->tipo = $_REQUEST["txtTipo"];
    $result = "";
    if($tipoContato->tipo != "")
    {
        $result = $tipoContato->inserir($tipoContato);
    }
    header("location:../tipoContato.php?r=$result");
}
else if(isset($_REQUEST["alterar"]))
{
    $tipoContato = new TipoContato();
    $tipoContato->tipo = $_REQUEST["txtTipo"];
    $tipoContato->id = $_REQUEST["id"];
    $result = "";
    if($tipoContato->tipo != "")
    {
        $result = $tipoContato->alterar($tipoContato);
    }
    header("location:../tipoContato.php?r=$result");
}
else if(isset($_REQUEST["excluir"])){
    $tipoContato = new TipoContato();
    $tipoContato->id = $_REQUEST["id"];
    $result = false;
    $result = $tipoContato->excluir($tipoContato->id);
    header("location:../tipoContato.php?r=$result");
}





class tipocontatoController
{
    function __construct(){
    }

    function retornaTodos()
    {
        $tipoContato = new TipoContato();
        return $tipoContato->consultarTodos();
    }

    function retorna($id)
    {
        $tipoContato = new TipoContato();
        return $tipoContato->consultar($id);
    }
}

?>