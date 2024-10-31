<?php
interface CombinacionInterface
{
    static public function mostrarCombinacion();
    static public function mostrarIdCombinacion($param);
    static public function guardarCombinacion(CombinacionModel $combinacion);    
    static public function eliminarCombinacion($param,$enabled);
    static public function listarCombinacionActivo();
}
?>