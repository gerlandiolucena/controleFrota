<?php
if(!file_exists("../models/Setor.php"))
    include_once "models/Setor.php";
else
    include_once "../models/Setor.php";

if(isset($_REQUEST["inserir"]))
{
        $setorM = new Setor();
        $setorM->Setor = $_REQUEST["txtsetor"];
        $result = "";
        if($setorM->Setor != "")
        {
            $result = $setorM->inserirSetor($setorM);
        }
        header("location:../setores.php?r=$result");
}
else if(isset($_REQUEST["alterar"]))
{
    $setorM = new Setor();
    $setorM->id = $_REQUEST["id"];
    $setorM->Setor = $_REQUEST["txtsetor"];
    $result = "";
    if($setorM->Setor != "")
    {
        $result = $setorM->alterarSetor($setorM);
    }
    header("location:../setores.php?r=$result");
}
else if(isset($_REQUEST["excluir"]))
{

    foreach($_REQUEST["ids"] as $id=>$value)
    {
        $setorM = new Setor();
        $setorM->remover($value);
    }

    header("location:../setores.php?r=$result");
}

class setorController
{
    function __construct()
    {
        // TODO: Implement __construct() method.
    }

    function retornarTodos()
    {
        $setor = new Setor();
        return $setor->retornaSetores();
    }

}

?>