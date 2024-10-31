<?php
interface MaterialInterface
{
    static public function mostrarMateriales();
    static public function mostrarIdMateriales($param);
    static public function listarMaterialesActivos();
    static public function listarMaterialxTipoActivos($param);
    static public function guardarMateriales(MaterialModel $materiales);
    static public function actualizarMateriales(MaterialModel $materiales);
    static public function eliminarMateriales($param,$enabled);
}
?>