<?php
require_once '../../src/Model/tipoManufacturaModel.php';
require_once '../../src/Interface/tipoManufacturaInterface.php';
class TipoManufacturaRepository implements TipoManufacturaInterface
{
    static public function mostrarTipoManufactura()
    {
        return TipoManufacturaModel::getTipoManufactura();
    }
    static public function mostrarIdTipoManufactura($param)
    {
        return TipoManufacturaModel::getTipoManufacturaId($param);
    }
    static public function listarTipoManufacturaActivos()
    {
        return TipoManufacturaModel::getTipoManufacturaActivos();
    }
    static public function listarManufacturaxTrabajo($param)
    {
        return TipoManufacturaModel::getManufacturaxTrabajo($param);
    }
    static public function guardarTipoManufactura($tipoManufactura)
    {
        return $tipoManufactura->postTipoManufactura();
    }
    static public function eliminarTipoManufactura($param, $enabled)
    {
        return TipoManufacturaModel::deleteTipoManufactura($param,$enabled);
    }
}
?>