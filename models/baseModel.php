<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gerlandio
 * Date: 03/09/14
 * Time: 18:32
 * To change this template use File | Settings | File Templates.
 */

abstract class baseModel {
    abstract function inserir($objeto);
    abstract function alterar($objeto);
    abstract function excluir($id);
    abstract function consultar($id);
    abstract function consultarTodos();
}