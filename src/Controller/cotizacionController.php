<?php
class CotizacionController
{
    static public function listarCotizacion($local)
    {
        return CotizacionRepository::listarCotizacion($local);
    }
    static public function listarIdCotizacion($param)
    {
        return CotizacionRepository::listarIdCotizacion($param);
    }
    static public function guardarCotizacion($cotizacion)
    {
        return CotizacionRepository::guardarCotizacion($cotizacion);
    }
    static public function actualizarCotizacion($cotizacion)
    {
        return CotizacionRepository::actualizarCotizacion($cotizacion);
    }
    static public function eliminarCotizacion($param,$enabled)
    {
        return CotizacionRepository::eliminarCotizacion($param,$enabled);
    }
    static public function motivoCotizacion($arrayResponse)
    {
        return CotizacionRepository::motivoCotizacion($arrayResponse);
    }
    static public function listarCotizacionFecha($desde,$hasta,$local)
    {
        return CotizacionRepository::listarCotizacionFecha($desde,$hasta,$local);
    }
    static public function listarCotizacionFacturados($arrays_id)
    {
        return CotizacionRepository::listarCotizacionFacturados($arrays_id);
    }
}
?>