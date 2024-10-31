<?php
interface CorrelativoInterfrace
{
    static public function mostrarCorrelativo();
    static public function mostrarIdCorrelativo($param);
    static public function guardarCorrelativo(CorrelativoModel $correlativo);
    static public function actualizarCorrelativo(CorrelativoModel $correlativo);
    static public function eliminarCorrelativo($param,$enabled);
}
?>