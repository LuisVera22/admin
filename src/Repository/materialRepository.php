<?php
require_once '../../src/Model/materialModel.php';
require_once '../../src/Interface/materialInterface.php';

class MaterialRepository implements MaterialInterface
{
    static public function mostrarMateriales()
    {
        return MaterialModel::getMateriales();
    }
    static public function mostrarIdMateriales($param)
    {
        return MaterialModel::getMaterialesId($param);
    }
    static public function listarMaterialesActivos()
    {
        return MaterialModel::getMaterialesActivos();
    }
    static public function listarMaterialxTipoActivos($param)
    {
        return MaterialModel::getMaterialxTipoActivos($param);
    }
    static public function listarMaterialxSubTipoActivos($param)
    {
        return MaterialModel::getMaterialxSubTipoActivos($param);
    }
    static public function guardarMateriales($materiales)
    {
        return $materiales->postMateriales();
    }
    static public function actualizarMateriales($materiales)
    {
        return $materiales->putMateriales();
    }
    static public function eliminarMateriales($param, $enabled)
    {
        return MaterialModel::deleteMateriales($param,$enabled);
    }
}
?>