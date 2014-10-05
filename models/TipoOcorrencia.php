<?php
if(!@file_exists('../DAL/openConnection.php') ) {
    include_once "DAL/openConnection.php";
}else{
    include_once "../DAL/openConnection.php";
}
include_once "baseModel.php";
class TipoOcorrencia extends baseModel {

    var $id;
    var $tipo;
    var $tempMin;
    var $tempMax;

    function __construct(){}

    function inserir($objeto)
    {
        try{
            $con = openConnection();
            mysqli_query($con, "insert into tipoocorrencia (descricao, tempoMin, tempoMax) values ('$objeto->tipo', $objeto->tempMin, $objeto->tempMax);") or die(mysqli_error($con));
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
            mysqli_query($con, "update tipoocorrencia set descricao = '$objeto->tipo', tempoMin = $objeto->tempMin, tempoMax = $objeto->tempMax where id = $objeto->id;") or die(mysqli_error($con));
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
            mysqli_query($con, "delete from tipoocorrencia where id = $id;") or die(mysqli_error($con));
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
            $result = mysqli_query($con, "select * from tipoocorrencia where id = $id;") or die(mysqli_error($con));
            $tipoOcorrencia = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoOcorrencia["id"] = $tipo["id"];
                $tipoOcorrencia["tipo"] = $tipo["descricao"];
                $tipoOcorrencia["tempMin"] = $tipo["tempoMin"];
                $tipoOcorrencia["tempMax"] = $tipo["tempoMax"];
            }

            return $tipoOcorrencia;
        }catch (Exception $erro)
        {
            return null;
        }
    }

    function consultarTodos()
    {
        try{
            $con = openConnection();
            $result = mysqli_query($con, "select * from tipoocorrencia") or die(mysqli_error($con));
            $tipoOcorrencias = array();
            while($tipo = mysqli_fetch_array($result))
            {
                $tipoOcorrencia = array();
                $tipoOcorrencia["id"] = $tipo["id"];
                $tipoOcorrencia["tipo"] = $tipo["descricao"];
                $tipoOcorrencia["tempMin"] = $tipo["tempomin"];
                $tipoOcorrencia["tempMax"] = $tipo["tempomax"];
                array_push($tipoOcorrencias,$tipoOcorrencia);
            }

            return $tipoOcorrencias;
        }catch (Exception $erro)
        {
            return null;
        }
    }
}