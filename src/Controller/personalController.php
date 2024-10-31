<?php
class PersonalController
{
    static public function mostrarPersonal()
    {
        return PersonalRepository::mostrarPersonal();
    }
    static public function mostrarIdPersonal($param)
    {
        return PersonalRepository::mostrarIdPersonal($param);
    }
    static public function guardarPersonal($personal)
    {
        return PersonalRepository::guardarPersonal($personal);
    }
    static public function actualizarPersonal($personal)
    {
        return PersonalRepository::actualizarPersonal($personal);
    }
    static public function eliminarPersonal($param,$enabled)
    {
        return PersonalRepository::eliminarPersonal($param,$enabled);
    }
    static public function mostrarRolPersonal($rol)
    {
        return PersonalRepository::mostrarRolPersonal($rol);
    }
}
?>