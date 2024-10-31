<?php
class LocalController
{
    static public function mostrarLocal()
    {
        return LocalRepository::mostrarLocal();
    }
    static public function mostrarIdLocal($param)
    {
        return LocalRepository::mostrarIdLocal($param);
    }
    static public function listarLocalActivos()
    {
        return LocalRepository::listarLocalActivos();
    }
    static public function guardarLocal($locales)
    {
        return LocalRepository::guardarLocal($locales);
    }
    static public function actualizarLocal($locales)
    {
        return LocalRepository::actualizarLocal($locales);
    }
    static public function eliminarSede($param,$enabled)
    {
        return LocalRepository::eliminarSede($param,$enabled);
    }
}
?>