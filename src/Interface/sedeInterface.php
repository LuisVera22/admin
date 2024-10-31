<?php
interface SedeInterface
{
    static public function mostrarSede();
    static public function mostrarIdSede($param);
    static public function listarSedeActivos();
    static public function guardarSede(SedeModel $sedes);
    static public function actualizarSede(SedeModel $sedes);
    static public function eliminarSede($param,$enabled);
}
?>