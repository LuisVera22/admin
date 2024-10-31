<?php
class ProveedorController
{
    static public function mostrarProveedor()
    {
        return ProveedorRepository::mostrarProveedor();
    }
    static public function mostrarIdProveedor($param)
    {
        return ProveedorRepository::mostrarIdProveedor($param);
    }
    static public function guardarProveedor($proveedor)
    {
        return ProveedorRepository::guardarProveedor($proveedor);
    }
    static public function actualizarProveedor($proveedor)
    {
        return ProveedorRepository::actualizarProveedor($proveedor);
    }
    static public function eliminarProveedor($param,$enabled)
    {
        return ProveedorRepository::eliminarProveedor($param,$enabled);
    }
}
?>