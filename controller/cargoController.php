<?php
if(!file_exists("../models/Cargo.php"))
    include_once "models/Cargo.php";
else
    include_once "../models/Cargo.php";

if(isset($_REQUEST["inserir"]))
{
    $cargo = new Cargo();
    $cargo->id_setor = $_REQUEST["setor"];
    $cargo->cargo = $_REQUEST["txtcargo"];
    $result = "";
    if($cargo->cargo != "")
    {
        $result = $cargo->inserir($cargo);
    }
    header("location:../cargo.php?r=$result");
}
else if(isset($_REQUEST["alterar"]))
{
    $cargo = new Cargo();
    $cargo->id = $_REQUEST["id"];
    $cargo->id_setor = $_REQUEST["setor"];
    $cargo->cargo = $_REQUEST["txtcargo"];
    $result = "";
    if($cargo->cargo != "")
    {
        $result = $cargo->alterar($cargo);
    }
    header("location:../cargo.php?r=$result");
}
else if(isset($_REQUEST["excluir"]))
{
    $cargo = new Cargo();
    foreach($_POST["ids"] as $id=>$value)
    {
        $result = $cargo->excluir($value);
    }
    header("location:../cargo.php?r=$result");
}

class cargoController
{
    function __construct(){}

    function retornarTodos()
    {
        $cargo = new  Cargo();
        return $cargo->consultarTodos();
    }
}

?>