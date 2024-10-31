<?php
class ProductoController
{
    static public function mostrarProducto($categoria)
    {
        return ProductoRepository::mostrarProducto($categoria);
    }
    static public function mostrarIdProducto($param)
    {
        return ProductoRepository::mostrarIdProducto($param);
    }
    static public function guardarProducto($producto)
    {
        return ProductoRepository::guardarProducto($producto);
    }
    static public function actualizarProducto($producto)
    {
        return ProductoRepository::actualizarProducto($producto);
    }
    static public function eliminarProducto($param,$enabled)
    {
        return ProductoRepository::eliminarProducto($param,$enabled);
    }
    static public function mostrarServiciosActivos($categoria)
    {
        return ProductoRepository::mostrarServiciosActivos($categoria);
    }    
    static public function listarProductoxManufactura($param)
    {
        return ProductoRepository::listarProductoxManufactura($param);
    }
}
?>