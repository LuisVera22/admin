<?php
interface ProductoInterface
{
    static public function mostrarProducto($categoria);
    static public function mostrarIdProducto($param);
    static public function guardarProducto(ProductoModel $producto);
    static public function actualizarProducto(ProductoModel $producto);
    static public function eliminarProducto($param,$enabled);
    static public function mostrarServiciosActivos($categoria);    
    static public function listarProductoxManufactura($param);
}
?>