<?php
require_once '../../src/Interface/correlativolocalInterface.php';
require_once '../../src/Model/correlativolocalModel.php';

class CorrelativoLocalRepository implements CorrelativoLocalInterfrace
{
    static public function mostrarCorrelativoLocal($param)
    {
        return CorrelativoLocalModel::getCorrelativoLugar($param);
    }
    static public function guardarCorrelativoLocal(CorrelativoLocalModel $correlativolocal)
    {
        return $correlativolocal->postCorrelativoLugar();
    }
    static public function eliminarCorrelativoLocal($param,$enabled)
    {

    }
}
?>