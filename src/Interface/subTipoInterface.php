<?php
interface SubTipoInterface
{
    static public function mostrarSubTipo();
    static public function mostrarIdSubTipo($param);
    static public function listarSubTipoActivos();
    static public function guardarSubTipo($subtipo);
    static public function actualizarSubTipo($subtipo);
    static public function eliminarSubTipo($param,$enabled);
    static public function SubTiposxTipoActivos($param);
}
?>