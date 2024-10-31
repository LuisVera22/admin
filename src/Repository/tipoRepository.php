<?php
require_once '../../src/Model/tipoModel.php';
require_once '../../src/Interface/tipoInterface.php';

class TipoRepository implements TipoInterface
{
    static public function mostrarTipo()
    {
        return TipoModel::getTipo();
    }
    static public function mostrarIdTipo($param)
    {
        return TipoModel::getTipoId($param);
    }
    static public function listarTipoActivos()
    {
        return TipoModel::getTipoActivos();
    }
    static public function listarManufacturaxTipoActivos($param)
    {
        return TipoModel::getManufacturaxTipoActivos($param);
    }    
    static public function listarManufacturaxAlmacen($param,$param2)
    {
        return TipoModel::getManufacturaxAlmacen($param,$param2);
    }       
    static public function guardarTipo($tipo)
    {
        return $tipo->postTipo();
    }
    static public function actualizarTipo($tipo)
    {
        return $tipo->putTipo();
    }
    static public function eliminarTipo($param,$enabled)
    {
        return TipoModel::deleteTipo($param,$enabled);
    }
}