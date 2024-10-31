<?php
interface PersonalInterface
{
    static public function mostrarPersonal();
    static public function mostrarIdPersonal($param);
    static public function guardarPersonal(PersonalModel $personal);
    static public function actualizarPersonal(PersonalModel $personal);
    static public function eliminarPersonal($param,$enabled);
    static public function mostrarRolPersonal($rol);
}
?>