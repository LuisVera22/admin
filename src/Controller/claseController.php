<?php
class ClaseController
{
    static public function mostrarClases()
    {
        return ClaseRepository::mostrarClases();
    }
    static public function mostrarIdClases($param)
    {
        return ClaseRepository::mostrarIdClases($param);
    }
    static public function listarClasesActivos()
    {
        return ClaseRepository::listarClasesActivos();
    }
    static public function listarClasexMaterialActivos($param)
    {
        return ClaseRepository::listarClasexMaterialActivos($param);
    }
    static public function guardarClases($clases)
    {
        return ClaseRepository::guardarClases($clases);
    }
    static public function actualizarClases($clases)
    {
        return ClaseRepository::actualizarClases($clases);
    }
    static public function eliminarClases($param,$enabled)
    {
        return ClaseRepository::eliminarClases($param,$enabled);
    }
}
?>