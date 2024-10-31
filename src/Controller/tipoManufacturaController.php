<?php
class TipoManufacturaController
{
    static public function mostrarTipoManufactura()
    {
        return TipoManufacturaRepository::mostrarTipoManufactura();
    }
    static public function mostrarIdTipoManufactura($param)
    {
        return TipoManufacturaRepository::mostrarIdTipoManufactura($param);
    }
    static public function listarTipoManufacturaActivos()
    {
        return TipoManufacturaRepository::listarTipoManufacturaActivos();
    }
    static public function guardarTipoManufactura($tipoManufactura)
    {
        return TipoManufacturaRepository::guardarTipoManufactura($tipoManufactura);
    }
    static public function eliminarTipoManufactura($param,$enabled)
    {
        return TipoManufacturaRepository::eliminarTipoManufactura($param,$enabled);
    }
    static public function listarManufacturaxTrabajo($param)
    {
        return TipoManufacturaRepository::listarManufacturaxTrabajo($param);
    }
}
?>