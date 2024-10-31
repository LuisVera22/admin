<?php
class TipoController
{
    static public function mostrarTipo()
    {
        return TipoRepository::mostrarTipo();
    }
    static public function mostrarIdTipo($param)
    {
        return TipoRepository::mostrarIdTipo($param);
    }    
    static public function listarTipoActivos()
    {
        return TipoRepository::listarTipoActivos();
    }
    static public function listarManufacturaxTipoActivos($param)
    {
        return TipoRepository::listarManufacturaxTipoActivos($param);
    }
    static public function listarManufacturaxAlmacen($param,$param2)
    {
        return TipoRepository::listarManufacturaxAlmacen($param,$param2);
    }    
    static public function guardarTipo($tipo)
    {
        return TipoRepository::guardarTipo($tipo);
    }
    static public function actualizarTipo($tipo)
    {
        return TipoRepository::actualizarTipo($tipo);
    }
    static public function eliminarTipo($param,$enabled)
    {
        return TipoRepository::eliminarTipo($param,$enabled);
    }    
}