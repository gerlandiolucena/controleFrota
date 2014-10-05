<?php
include_once "baseModel.php";

if(file_exists("DAL/openConnection.php")){
    include_once "DAL/openConnection.php";
}
else{
    include_once "../DAL/openConnection.php";
}

class Cargo extends baseModel{

    var $id;
    var $id_setor;
    var $cargo;

    function inserir($objeto)
    {
        try{
            $con = openConnection();
            $sql = "insert into cargo (id_setor, nomeCargo) values ($objeto->id_setor, '$objeto->cargo');";
            mysqli_query($con, $sql) or die(mysqli_error($con));
            return true;
        }
        catch(Exception $erro)
        {
            return false;
        }
    }

    function alterar($objeto)
    {
        try{
            $con = openConnection();
            $sql = "update cargo set id_setor = $objeto->id_setor, nomeCargo = '$objeto->cargo' where id = $objeto->id;";
            mysqli_query($con, $sql) or die(mysqli_error($con));
            return true;
        }
        catch(Exception $erro)
        {
            return false;
        }
    }

    function excluir($id)
    {
        try{
            $con = openConnection();
            $sql = "delete from cargo where id = $id;";
            mysqli_query($con, $sql) or die(mysqli_error($con));
            return true;
        }
        catch(Exception $erro)
        {
            return false;
        }
    }

    function consultar($id)
    {
        try{
            $con = openConnection();
            $sql = "select cg.id, cg.id_setor, cg.nomeCargo,st.NomeSetor from cargo cg inner join setor st on st.id = cg.id_setor  where id = $id;";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            $cargo = array();
            while($res = mysqli_fetch_array($result))
            {
                $cargo["id"] = $res["id"];
                $cargo["id_setor"] = $res["id_setor"];
                $cargo["nomeCargo"] = $res["nomeCargo"];
                $cargo["setor"] = $res["nomesetor"];
            }
            return $cargo;

        }
        catch(Exception $erro)
        {
            return false;
        }
    }

    function consultarTodos()
    {
        try{
            $con = openConnection();
            $sql = "select cg.id, cg.id_setor, cg.nomeCargo,st.NomeSetor as setor, st.id as idSetor from cargo cg inner join setor st on st.id = cg.id_setor ";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            $cargos = array();
            while($res = mysqli_fetch_array($result))
            {
                $cargo = array();
                $cargo["id"] = $res["id"];
                $cargo["id_setor"] = $res["id_setor"];
                $cargo["nomeCargo"] = $res["nomeCargo"];
                $cargo["setor"] = $res["setor"];
                $cargo["idsetor"] = $res["idSetor"];
                array_push($cargos, $cargo);
            }
            return $cargos;

        }
        catch(Exception $erro)
        {
            return false;
        }
    }
}

?>