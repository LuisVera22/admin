<?php
require_once '../../src/Model/subclaseModel.php';
require_once '../../src/Interface/subclaseInterface.php';

class SubClaseRepository implements SubClaseInterface
{
    static public function mostrarSubClases()
    {
        return SubClaseModel::getSubClases();
    }
    static public function mostrarIdSubClases($param)
    {
        return SubClaseModel::getSubClasesId($param);
    }
    static public function listarSubClasesActivos()
    {
        return SubClaseModel::getSubClasesActivos();
    }
    static public function listarSubClasexClaseActivos($param)
    {
        return SubClaseModel::getSubClasexClaseActivos($param);
    }
    static public function guardarSubClases($subclases)
    {
        return $subclases->postSubClases();
    }
    static public function actualizarSubClases($subclases)
    {
        return $subclases->putSubClases();
    }
    static public function eliminarSubClases($param,$enabled)
    {
        return SubClaseModel::deleteSubClases($param,$enabled);
    }
}
?>