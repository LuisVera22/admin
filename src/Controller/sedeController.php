<?php
class SedeController
{
    static public function mostrarSede()
    {
        return SedeRepository::mostrarSede();
    }
    static public function mostrarIdSede($param)
    {
        return SedeRepository::mostrarIdSede($param);
    }
    static public function listarSedeActivos()
    {
        return SedeRepository::listarSedeActivos();
    }
    static public function actualizarSede($sedes)
    {
        return SedeRepository::actualizarSede($sedes);
    }
    static public function guardarSede($sedes)
    {
        return SedeRepository::guardarSede($sedes);
    }
    static public function eliminarSede($param,$enabled)
    {
        return SedeRepository::eliminarSede($param,$enabled);
    }
}
?>