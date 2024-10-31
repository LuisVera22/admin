<?php
interface RolInterface
{
    static public function mostrarRol();
    static public function mostrarIdRol($param);
    static public function listarRolActivos();
    static public function guardarRol(RolModel $roles);
    static public function actualizarRol(RolModel $roles);
    static public function eliminarRol($param,$enabled);
}
?>