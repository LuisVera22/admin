<?php
interface TipoInterface
{
    static public function mostrarTipo();
    static public function mostrarIdTipo($param);
    static public function listarTipoActivos();
    static public function listarManufacturaxTipoActivos($param);
    static public function listarManufacturaxAlmacen($param,$param2);    
    static public function guardarTipo($tipo);
    static public function actualizarTipo($tipo);
    static public function eliminarTipo($param,$enabled);    
}