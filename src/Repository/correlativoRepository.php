<?php
require_once '../../src/Model/correlativoModel.php';
require_once '../../src/Interface/correlativoInterface.php';

class CorrelativoRepository implements CorrelativoInterfrace
{
    static public function mostrarCorrelativo()
    {
        return CorrelativoModel::getCorrelativo();
    }
    static public function mostrarIdCorrelativo($param)
    {
        return CorrelativoModel::getCorrelativoId($param);
    }
    static public function guardarCorrelativo($correlativo)
    {
        return $correlativo->postCorrelativo();
    }
    static public function actualizarCorrelativo($correlativo)
    {
        return $correlativo->putCorrelativo();
    }
    static public function eliminarCorrelativo($param,$enabled)
    {
        return CorrelativoModel::deleteCorrelativo($param,$enabled);
    }
}
?>