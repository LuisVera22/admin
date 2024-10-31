<?php
require_once '../../src/Model/productoModel.php';
require_once '../../src/Interface/productoInterface.php';

class ProductoRepository implements ProductoInterface
{
    static public function mostrarProducto($categoria)
    {
        return ProductoModel::getProducto($categoria);
    }
    static public function mostrarIdProducto($param)
    {
        return ProductoModel::getProductoId($param);
    }
    static public function guardarProducto($producto)
    {
        return $producto->postProducto();
    }
    static public function actualizarProducto($producto)
    {
        return $producto->putProducto();
    }
    static public function eliminarProducto($param,$enabled)
    {
        return ProductoModel::deleteProducto($param,$enabled);
    }
    static public function mostrarServiciosActivos($categoria)
    {
        return ProductoModel::getServiciosActivos($categoria);
    }
    static public function listarProductoxManufactura($param)
    {
        return ProductoModel::getProductoxManufactura($param);
    }
}