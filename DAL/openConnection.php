<?php

function openConnection()
{

    $con = mysqli_connect("localhost", "root", "", "ctrl_frota");
    return $con;
}

?>