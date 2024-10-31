<?php
interface CotizacionInterface
{
    static public function listarCotizacion($local);
    static public function listarIdCotizacion($param);
    static public function guardarCotizacion(CotizacionModel $cotizacion);
    static public function actualizarCotizacion(CotizacionModel $cotizacion);
    static public function eliminarCotizacion($param,$enabled);
    static public function motivoCotizacion($arrayResponse);
    static public function listarCotizacionFecha($desde,$hasta,$local);
    static public function listarCotizacionFacturados($arrays_id);
}
?>