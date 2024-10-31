<?php
require_once '../../src/Model/cambiarpasswordModel.php';
require_once '../../src/Interface/cambiarpasswordInterface.php';

class CambiarpasswordRepository implements CambiarpasswordInterface
{
    static public function cambiarPassword($correo,$password)
    {
        return CambiarpasswordModel::getCambiarpassword($correo,$password);
    }
}