<?php
if(!@file_exists('../DAL/openConnection.php') ) {
    include_once "DAL/openConnection.php";
}else{
    include_once "../DAL/openConnection.php";
}
include_once "baseModel.php";

class TipoVeiculo extends baseModel {

    var $id;
    var $tipo;

    function inserir($objeto)
    {
        try{
            $con = openConnection();
            mysqli_query($con, "insert into tipoveiculo (descricao) values ('$objeto->tipo');") or die(mysqli_error($con));
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
            mysqli_query($con, "update tipoproduto set descricao = '$objeto->tipo' where id = $objeto->id;") or die(mysqli_error($con));
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
            mysqli_query($con, "delete from tipoveiculo where id = $id;") or die(mysqli_error($con));
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
            $result = mysqli_query($con, "select * from tipoveiculo where id = $id;") or die(mysqli_error($con));
            $tipoVeiculo = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoVeiculo["id"] = $tipo["id"];
                $tipoVeiculo["tipo"] = $tipo["descricao"];
            }

            return $tipoVeiculo;
        }catch (Exception $erro)
        {
            return null;
        }
    }

    function consultarTodos()
    {
        try{
            $con = openConnection();
            $result = mysqli_query($con, "select * from tipoveiculo;") or die(mysqli_error($con));
            $tipoVeiculos = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoVeiculo = array();
                $tipoVeiculo["id"] = $tipo["id"];
                $tipoVeiculo["tipo"] = $tipo["Descricao"];
                array_push($tipoVeiculos,$tipoVeiculo);
            }

            return $tipoVeiculos;
        }catch (Exception $erro)
        {
            return null;
        }
    }
}