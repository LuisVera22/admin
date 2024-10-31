<?php
interface SubClaseInterface
{
    static public function mostrarSubClases();
    static public function mostrarIdSubClases($param);
    static public function listarSubClasesActivos();
    static public function listarSubClasexClaseActivos($param);
    static public function guardarSubClases(SubClaseModel $subclases);
    static public function actualizarSubClases(SubClaseModel $subclases);
    static public function eliminarSubClases($param,$enabled);
}
?>