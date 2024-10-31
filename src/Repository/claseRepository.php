<?php
require_once '../../src/Model/claseModel.php';
require_once '../../src/Interface/claseInterface.php';

class ClaseRepository implements ClaseInterface
{
    static public function mostrarClases()
    {
        return ClaseModel::getClases();
    }
    static public function mostrarIdClases($param)
    {
        return ClaseModel::getClasesId($param);
    }
    static public function listarClasesActivos()
    {
        return ClaseModel::getClasesActivos();
    }
    static public function listarClasexMaterialActivos($param)
    {
        return ClaseModel::getClasexMaterialActivos($param);
    }
    static public function guardarClases($clases)
    {
        return $clases->postClases();
    }
    static public function actualizarClases($clases)
    {
        return $clases->putClases();
    }
    static public function eliminarClases($param,$enabled)
    {
        return ClaseModel::deleteClases($param,$enabled);
    }
}
?>