<?php
require_once '../../src/Model/subtipoModel.php';
require_once '../../src/Interface/subtipoInterface.php';

class SubtipoRepository implements SubTipoInterface
{
    static public function mostrarSubTipo()
    {
        return SubtipoModel::getSubTipo();
    }
    static public function mostrarIdSubTipo($param)
    {
        return SubtipoModel::getSubTipoId($param);
    }
    static public function listarSubTipoActivos()
    {
        return SubtipoModel::getSubTipoActivos();
    }
    static public function guardarSubTipo($subtipo)
    {
        return $subtipo->postSubTipo();
    }
    static public function actualizarSubTipo($subtipo)
    {
        return $subtipo->putSubTipo();
    }
    static public function eliminarSubTipo($param, $enabled)
    {
        return SubtipoModel::deleteSubTipo($param,$enabled);
    }
    static public function SubTiposxTipoActivos($param)
    {
        return SubtipoModel::getSubTiposxTipo($param);
    }
}
?>