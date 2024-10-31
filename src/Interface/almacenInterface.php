<?php
interface AlmacenInterface
{
    static public function mostrarAlmacen($tipo);
    static public function mostrarIdAlmacen($param);
    static public function guardarAlmacen(AlmacenModel $almacen);    
    static public function eliminarAlmacen($param,$enabled);
    static public function listarProductoAlmacenxManufactura($manufactura,$sede);
    static public function exportarAlmacen($param);
    static public function cargarAlmacen($data);
    static public function listarAlmacenxManufactura($manufactura);
}
?>