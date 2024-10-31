<?php
class SubClaseController
{
    static public function mostrarSubClases()
    {
        return SubclaseRepository::mostrarSubClases();
    }
    static public function mostrarIdSubClases($param)
    {
        return SubclaseRepository::mostrarIdSubClases($param);
    }
    static public function listarSubClasesActivos()
    {
        return SubclaseRepository::listarSubClasesActivos();
    }
    static public function listarSubClasexClaseActivos($param)
    {
        return SubclaseRepository::listarSubClasexClaseActivos($param);
    }
    static public function guardarSubClases($SubClases)
    {
        return SubclaseRepository::guardarSubClases($SubClases);
    }
    static public function actualizarSubClases($SubClases)
    {
        return SubclaseRepository::actualizarSubClases($SubClases);
    }
    static public function eliminarSubClases($param,$enabled)
    {
        return SubclaseRepository::eliminarSubClases($param,$enabled);
    }
}
?>