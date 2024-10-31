<?php
require_once '../../src/Model/cotizacionModel.php';
require_once '../../src/Interface/cotizacionInterface.php';

class CotizacionRepository implements CotizacionInterface
{
    static public function listarCotizacion($local)
    {
        return CotizacionModel::getCotizacion($local);
    }
    static public function listarIdCotizacion($param)
    {
        return CotizacionModel::getIdCotizacion($param);
    }
    static public function guardarCotizacion($cotizacion)
    {
        return $cotizacion->postCotizacion();
    }
    static public function actualizarCotizacion($cotizacion)
    {
        return $cotizacion->putCotizacion();
    }
    static public function eliminarCotizacion($param,$enabled)
    {
        return CotizacionModel::deleteCotizacion($param,$enabled);
    }
    static public function motivoCotizacion($arrayResponse)
    {
        return CotizacionModel::postmotivosCotizacion($arrayResponse);
    }
    static public function listarCotizacionFecha($desde,$hasta,$local)
    {
        return CotizacionModel::postCotizacionDates($desde,$hasta,$local);
    }
    static public function listarCotizacionFacturados($arrays_id)
    {
        return CotizacionModel::postCotizacionFacturados($arrays_id);
    }
}
?>