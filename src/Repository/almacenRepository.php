<?php
require_once '../../src/Model/almacenModel.php';
require_once '../../src/Interface/almacenInterface.php';

class AlmacenRepository implements AlmacenInterface
{
    static public function mostrarAlmacen($tipo)
    {
        return AlmacenModel::getAlmacen($tipo);
    }
    static public function mostrarIdAlmacen($param)
    {
        return AlmacenModel::getAlmacenId($param);
    }
    static public function guardarAlmacen($almacen)
    {
        return $almacen->postAlmacen();
    }
    static public function eliminarAlmacen($param, $enabled)
    {
        return AlmacenModel::deleteAlmacen($param, $enabled);
    }
    static public function listarProductoAlmacenxManufactura($manufactura,$sede)
    {
        return AlmacenModel::getProductoAlmacenxManufactura($manufactura,$sede);
    }
    static public function exportarAlmacen($param)
    {
        return AlmacenModel::getExportarAlmacen($param);
    }
    static public function cargarAlmacen($data)
    {
        return AlmacenModel::postCargarData($data);
    }
    static public function listarAlmacenxManufactura($manufactura)
    {
        return AlmacenModel::getAlmacenxManufactura($manufactura);
    }
}
