<?php
require_once '../../src/Model/sedeModel.php';
require_once '../../src/Interface/sedeInterface.php';

class SedeRepository implements SedeInterface
{
    static public function mostrarSede()
    {
        return SedeModel::getSede();
    }
    static public function mostrarIdSede($param)
    {
        return SedeModel::getSedeId($param);
    }
    static public function listarSedeActivos()
    {
        return SedeModel::getSedeActivos();
    }
    static public function guardarSede($sedes)
    {
        return $sedes->postSede();
    }
    static public function actualizarSede($sedes)
    {
        return $sedes->putSede();
    }
    static public function eliminarSede($param,$enabled)
    {
        return SedeModel::deleteSede($param,$enabled);
    }
}
?>