<?php
require_once '../../src/Model/proveedorModel.php';
require_once '../../src/Interface/proveedorInterface.php';

class ProveedorRepository implements ProveedorInterface
{
    static public function mostrarProveedor()
    {
        return ProveedorModel::getProveedor();
    }
    static public function mostrarIdProveedor($param)
    {
        return ProveedorModel::getProveedorId($param);
    }
    static public function guardarProveedor($proveedor)
    {
        return $proveedor->postProveedor();
    }
    static public function actualizarProveedor($proveedor)
    {
        return $proveedor->putProveedor();
    }
    static public function eliminarProveedor($param,$enabled)
    {
        return ProveedorModel::deleteProveedor($param,$enabled);
    }
}
?>