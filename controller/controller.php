<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gerlandio
 * Date: 27/08/14
 * Time: 21:34
 * To change this template use File | Settings | File Templates.
 */
include_once "models/Setor.php";
class setorController
{
    function retornarSetores()
    {
        $setorM = new Setor();
        return $setorM->retornaSetores();
    }
}

?>