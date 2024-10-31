<?php
class SubTipoController
{
    static public function mostrarSubTipo()
    {
        return SubtipoRepository::mostrarSubTipo();
    }
    static public function mostrarIdSubTipo($param)
    {
        return SubtipoRepository::mostrarIdSubTipo($param);
    }
    static public function listarSubTipoActivos()
    {
        return SubtipoRepository::listarSubTipoActivos();
    }
    static public function guardarSubTipo($subtipo)
    {
        return SubtipoRepository::guardarSubTipo($subtipo);
    }
    static public function actualizarSubTipo($subtipo)
    {
        return SubtipoRepository::actualizarSubTipo($subtipo);
    }
    static public function eliminarSubTipo($param,$enabled)
    {
        return SubtipoRepository::eliminarSubTipo($param,$enabled);
    }
    static public function SubTiposxTipoActivos($param)
    {
        return SubtipoRepository::SubTiposxTipoActivos($param);
    }
}
?>