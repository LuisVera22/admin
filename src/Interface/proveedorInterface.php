<?php
interface ProveedorInterface
{
    static public function mostrarProveedor();
    static public function mostrarIdProveedor($param);
    static public function guardarProveedor(ProveedorModel $proveedor);
    static public function actualizarProveedor(ProveedorModel $proveedor);
    static public function eliminarProveedor($param,$enabled);
}
?>