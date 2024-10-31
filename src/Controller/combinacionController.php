<?php
class CombinacionController
{
    static public function mostrarCombinacion()
    {
        return CombinacionRepository::mostrarCombinacion();
    }
    static public function mostrarIdCombinacion($param)
    {
        return CombinacionRepository::mostrarIdCombinacion($param);
    }
    static public function guardarCombinacion($combinacion)
    {
        return CombinacionRepository::guardarCombinacion($combinacion);
    }
    static public function eliminarCombinacion($param,$enabled)
    {
        return CombinacionRepository::eliminarCombinacion($param,$enabled);
    }
    static public function listarCombinacionActivo()
    {
        return CombinacionRepository::listarCombinacionActivo();
    }
}
?>