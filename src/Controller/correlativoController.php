<?php
class CorrelativoController
{
    static public function mostrarCorrelativo()
    {
        return CorrelativoRepository::mostrarCorrelativo();
    }
    static public function mostrarIdCorrelativo($param)
    {
        return CorrelativoRepository::mostrarIdCorrelativo($param);
    }
    static public function guardarCorrelativo($correlativo)
    {
        return CorrelativoRepository::guardarCorrelativo($correlativo);
    }
    static public function actualizarCorrelativo($correlativo)
    {
        return CorrelativoRepository::actualizarCorrelativo($correlativo);
    }
    static public function eliminarCorrelativo($param,$enabled)
    {
        return CorrelativoRepository::eliminarCorrelativo($param,$enabled);
    }
}
?>