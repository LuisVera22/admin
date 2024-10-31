<?php
require_once '../../src/Model/personalModel.php';
require_once '../../src/Interface/personalInterface.php';

class PersonalRepository implements PersonalInterface
{
    static public function mostrarPersonal()
    {
        return PersonalModel::getPersonal();
    }
    static public function mostrarIdPersonal($param)
    {
        return PersonalModel::getPersonalId($param);
    }
    static public function guardarPersonal($personal)
    {
        return $personal->postPersonal();
    }
    static public function actualizarPersonal($personal)
    {
        return $personal->putPersonal();
    }
    static public function eliminarPersonal($param,$enabled)
    {
        return PersonalModel::deletePersonal($param,$enabled);
    }
    static public function mostrarRolPersonal($rol)
    {
        return PersonalModel::getRolPersonal($rol);
    }
}
?>