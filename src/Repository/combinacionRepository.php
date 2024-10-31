<?php
require_once '../../src/Model/combinacionModel.php';
require_once '../../src/Interface/combinacionInterface.php';

class CombinacionRepository implements CombinacionInterface
{
    static public function mostrarCombinacion()
    {
        return CombinacionModel::getCombinacion();
    }
    static public function mostrarIdCombinacion($param)
    {
        return CombinacionModel::getCombinacionId($param);
    }
    static public function guardarCombinacion($combinacion)
    {
        return $combinacion->postCombinacion();
    }    
    static public function eliminarCombinacion($param,$enabled)
    {
        return CombinacionModel::deleteCombinacion($param,$enabled);
    }
    static public function listarCombinacionActivo()
    {
        return CombinacionModel::getCombinacionActivo();
    }
}
?>