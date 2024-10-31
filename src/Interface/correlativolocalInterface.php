<?php
interface CorrelativoLocalInterfrace
{
    static public function mostrarCorrelativoLocal($param);    
    static public function guardarCorrelativoLocal(CorrelativoLocalModel $correlativolocal);
    static public function eliminarCorrelativoLocal($param,$enabled);
}
?>