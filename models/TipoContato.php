<?php
if(!@file_exists('../DAL/openConnection.php') ) {
    include_once "DAL/openConnection.php";
}else{
    include_once "../DAL/openConnection.php";
}
include_once "baseModel.php";
class TipoContato extends baseModel {

    var $id;
    var $tipo;

    function inserir($objeto)
    {
        try{
        $con = openConnection();
        mysqli_query($con, "insert into tipocontato (descricao) values ('$objeto->tipo');") or die(mysqli_error($con));
        return true;
        }catch (Exception $erro)
        {
            return false;
        }
    }

    function alterar($objeto)
    {
        try{
            $con = openConnection();
            mysqli_query($con, "update tipocontato set descricao = '$objeto->tipo' where id = $objeto->id;") or die(mysqli_error($con));
            return true;
        }catch (Exception $erro)
        {
            return false;
        }
    }

    function excluir($id)
    {
        try{
            $con = openConnection();
            mysqli_query($con, "delete from tipocontato where id = $id;") or die(mysqli_error($con));
            return true;
        }catch (Exception $erro)
        {
            return false;
        }
    }

    function consultar($id)
    {
        try{
            $con = openConnection();
            $result = mysqli_query($con, "select * from tipocontato where id = $id;") or die(mysqli_error($con));
            $tipoContato = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoContato["id"] = $tipo["id"];
                $tipoContato["tipo"] = $tipo["descricao"];
            }

            return $tipoContato;
        }catch (Exception $erro)
        {
            return null;
        }
    }

    function consultarTodos()
    {
        try{
            $con = openConnection();
            $result = mysqli_query($con, "select * from tipocontato") or die(mysqli_error($con));
            $tipoContatos = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoContato = array();
                $tipoContato["id"] = $tipo["id"];
                $tipoContato["tipo"] = $tipo["descricao"];
                array_push($tipoContatos,$tipoContato);
            }

            return $tipoContatos;
        }catch (Exception $erro)
        {
            return null;
        }
    }
}