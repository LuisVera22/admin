<?php
class CorrelativoLocalController
{
    static public function mostrarCorrelativoLocal($param)
    {
        return CorrelativoLocalRepository::mostrarCorrelativoLocal($param);
    }
    static public function guardarCorrelativoLocal($CorrelativoLocal)
    {
        return CorrelativoLocalRepository::guardarCorrelativoLocal($CorrelativoLocal);
    }
    static public function eliminarCorrelativoLocal($param,$enabled)
    {
        return CorrelativoLocalRepository::eliminarCorrelativoLocal($param,$enabled);
    }
}
?>