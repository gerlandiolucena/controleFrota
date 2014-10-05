<?php
if(!@file_exists('../DAL/openConnection.php') ) {
    include_once "DAL/openConnection.php";
}else{
    include_once "../DAL/openConnection.php";
}
include_once "baseModel.php";
class TipoProduto extends baseModel {

    var $id;
    var $especial;
    var $nome;
    var $status;

    function __construct(){}

    function inserir($objeto)
    {
        try{
            $con = openConnection();
            mysqli_query($con, "insert into tipoproduto (nome, especial, status) values ('$objeto->nome', '$objeto->especial', $objeto->status);") or die(mysqli_error($con));
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
            mysqli_query($con, "update tipoproduto set nome = '$objeto->nome',especial = '$objeto->especial',status = $objeto->status, where id = $objeto->id;") or die(mysqli_error($con));
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
            mysqli_query($con, "delete from tipoproduto where id = $id;") or die(mysqli_error($con));
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
            $result = mysqli_query($con, "select * from tipoproduto where id = $id;") or die(mysqli_error($con));
            $tipoProduto = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoProduto["id"] = $tipo["id"];
                $tipoProduto["nome"] = $tipo["nome"];
                $tipoProduto["especial"] = $tipo["especial"];
                $tipoProduto["status"] = $tipo["status"];
            }

            return $tipoProduto;
        }catch (Exception $erro)
        {
            return null;
        }
    }

    function consultarTodos()
    {
        try{
            $con = openConnection();
            $result = mysqli_query($con, "select * from tipoproduto;") or die(mysqli_error($con));
            $tipoProdutos = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoProduto = array();
                $tipoProduto["id"] = $tipo["id"];
                $tipoProduto["nome"] = $tipo["nome"];
                $tipoProduto["especial"] = $tipo["especial"];
                $tipoProduto["status"] = $tipo["status"];
                array_push($tipoProdutos,$tipoProduto);
            }

            return $tipoProdutos;
        }catch (Exception $erro)
        {
            return null;
        }
    }
}