<?php
class RolController
{
    static public function mostrarRol()
    {
        return RolRepository::mostrarRol();
    }
    static public function mostrarIdRol($param)
    {
        return RolRepository::mostrarIdRol($param);
    }
    static public function listarRolActivos()
    {
        return RolRepository::listarRolActivos();
    }
    static public function guardarRol($roles)
    {
        return RolRepository::guardarRol($roles);
    }
    static public function actualizarRol($roles)
    {
        return RolRepository::actualizarRol($roles);
    }
    static public function eliminarRol($param, $enabled)
    {
        return RolRepository::eliminarRol($param,$enabled);
    }
}
?>