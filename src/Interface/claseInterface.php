<?php
interface ClaseInterface
{
    static public function mostrarClases();
    static public function mostrarIdClases($param);
    static public function listarClasesActivos();
    static public function listarClasexMaterialActivos($param);
    static public function guardarClases(ClaseModel $clases);
    static public function actualizarClases(ClaseModel $clases);
    static public function eliminarClases($param,$enabled);
}
?>