<?php
interface TipoManufacturaInterface
{
    static public function mostrarTipoManufactura();
    static public function mostrarIdTipoManufactura($param);
    static public function listarTipoManufacturaActivos();
    static public function guardarTipoManufactura(TipoManufacturaModel $tipoManufactura);    
    static public function eliminarTipoManufactura($param,$enabled);
    static public function listarManufacturaxTrabajo($param);
}