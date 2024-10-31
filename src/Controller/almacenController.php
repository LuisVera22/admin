<?php
class AlmacenController
{
    static public function mostrarAlmacen($tipo)
    {
        return AlmacenRepository::mostrarAlmacen($tipo);
    }
    static public function mostrarIdAlmacen($param)
    {
        return AlmacenRepository::mostrarIdAlmacen($param);
    }
    static public function guardarAlmacen($almacen)
    {
        return AlmacenRepository::guardarAlmacen($almacen);
    }
    static public function eliminarAlmacen($param,$enabled)
    {
        return AlmacenRepository::eliminarAlmacen($param,$enabled);
    }
    static public function listarProductoAlmacenxManufactura($manufactura,$sede)
    {
        return AlmacenRepository::listarProductoAlmacenxManufactura($manufactura,$sede);
    }
    static public function exportarAlmacen($param)
    {
        return AlmacenRepository::exportarAlmacen($param);
    }
    static public function cargarAlmacen($data)
    {
        return AlmacenRepository::cargarAlmacen($data);
    }
    static public function listarAlmacenxManufactura($manufactura)
    {
        return AlmacenRepository::listarAlmacenxManufactura($manufactura);
    }
}
?>