<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Henrique
 * Date: 13/09/14
 * Time: 19:13
 * To change this template use File | Settings | File Templates.
 */

if(!@file_exists('../DAL/openConnection.php') ) {
include_once "DAL/openConnection.php";
}else{
    include_once "../DAL/openConnection.php";
}

class Setor {
    var $id;
    var $Cliente;

    function __construct()
    {
    }

    function inserirCliente($cliente)
    {
        $insert = "insert into cliente (Nomecliente) values ('$cliente->Cliente');";
        $con = openConnection();
        $result = mysqli_query($con,$insert) or die("Ocorreu um erro :".mysqli_error($con));
        return $result;
    }
    function alterarCliente($cliente)
    {
        $update = "update cliente set Nomecliente = '$cliente->Cliente' where id = $cliente->id;";
        $con = openConnection();
        $result = mysqli_query($con,$update) or die("Ocorreu um erro :".mysqli_error($con));
        return $result;
    }

    function retornaClientes()
    {
        $update = "select * from cliente";
        $con = openConnection();
        $result = mysqli_query($con,$update) or die("Ocorreu um erro :".mysqli_error($con));
        $cliente = array();

        while($set = mysqli_fetch_array($result)){
            $cliente = array();
            $cliente["id"] = $set["id"];
            $cliente["Cliente"] = $set["NomeCliente"];
            array_push($cliente,$Cliente);
        }
        return $cliente;
    }

}

?>