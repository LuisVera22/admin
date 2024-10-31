<?php
require_once '../../src/Model/rolModel.php';
require_once '../../src/Interface/rolInterface.php';

class RolRepository implements RolInterface
{
    static public function mostrarRol()
    {
        return RolModel::getRol();
    }
    static public function mostrarIdRol($param)
    {
        return RolModel::getRolId($param);
    }
    static public function listarRolActivos()
    {
        return RolModel::getRolActivos();
    }
    static public function guardarRol($roles)
    {
        return $roles->postRol();
    }
    static public function actualizarRol($roles)
    {
        return $roles->putRol();
    }
    static public function eliminarRol($param, $enabled)
    {
        return RolModel::deleteRol($param,$enabled);
    }
}
?>