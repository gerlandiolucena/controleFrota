<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gerlandio
 * Date: 27/08/14
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
    var $Setor;

    function __construct()
    {
    }

    function inserirSetor($setor)
    {
        $insert = "insert into setor (NomeSetor) values ('$setor->Setor');";
        $con = openConnection();
        $result = mysqli_query($con,$insert) or die("Ocorreu um erro :".mysqli_error($con));
        return $result;
    }
    function alterarSetor($setor)
    {
        $update = "update setor set NomeSetor = '$setor->Setor' where id = $setor->id;";
        $con = openConnection();
        $result = mysqli_query($con,$update) or die("Ocorreu um erro :".mysqli_error($con));
        return $result;
    }

    function remover($id)
    {
        $update = "delete from setor where id = $id;";
        $con = openConnection();
        $result = mysqli_query($con,$update) or die("Ocorreu um erro :".mysqli_error($con));
        return $result;
    }

    function retornaSetores()
    {
        $update = "select * from setor";
        $con = openConnection();
        $result = mysqli_query($con,$update) or die("Ocorreu um erro :".mysqli_error($con));
        $setores = array();

        while($set = mysqli_fetch_array($result)){
            $seto = array();
            $seto["id"] = $set["id"];
            $seto["Setor"] = $set["NomeSetor"];
            array_push($setores,$seto);
        }
        return $setores;
    }

}

?>