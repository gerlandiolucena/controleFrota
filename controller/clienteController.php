<?php
if(file_exists("../models/Cliente.php"))
	include_once "../models/Cliente.php";
else
	include_once "models/Cliente.php";

if(isset($_REQUEST["op"]))
{
    if($_REQUEST["op"] == "inserir")
    {
        $ClienteM = new Cliente();
        $ClienteM->Cliente = $_REQUEST["txtcliente"];
        $result = "";
        if($ClienteM->Cliente != "")
        {
            $result = $clienteM->inserirCliente($clienteM);
        }
        header("location:../Cliente.php?r=$result");
    }

}
class clienteController
{
   function __construct(){}
   
}
?>

