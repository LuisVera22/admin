<?php
interface LocalInterface
{
    static public function mostrarLocal();
    static public function mostrarIdLocal($param);
    static public function listarLocalActivos();
    static public function guardarLocal(LocalModel $locales);
    static public function actualizarLocal(LocalModel $locales);
    static public function eliminarSede($param,$enabled);
}
?>