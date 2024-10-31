<?php
class MaterialController
{
    static public function mostrarMateriales()
    {
        return MaterialRepository::mostrarMateriales();
    }
    static public function mostrarIdMateriales($param)
    {
        return MaterialRepository::mostrarIdMateriales($param);
    }
    static public function listarMaterialesActivos()
    {
        return MaterialRepository::listarMaterialesActivos();
    }
    static public function listarMaterialxTipoActivos($param)
    {
        return MaterialRepository::listarMaterialxTipoActivos($param);
    }
    static public function listarMaterialxSubTipoActivos($param)
    {
        return MaterialRepository::listarMaterialxSubTipoActivos($param);
    }
    static public function guardarMateriales($materiales)
    {
        return MaterialRepository::guardarMateriales($materiales);
    }
    static public function actualizarMateriales($materiales)
    {
        return MaterialRepository::actualizarMateriales($materiales);
    }
    static public function eliminarMateriales($param,$enabled)
    {
        return MaterialRepository::eliminarMateriales($param,$enabled);
    }
}
?>