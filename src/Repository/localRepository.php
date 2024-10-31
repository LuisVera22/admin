<?php
require_once '../../src/Model/localModel.php';
require_once '../../src/Interface/localInterface.php';
class LocalRepository implements LocalInterface
{
    static public function mostrarLocal()
    {
        return LocalModel::getLocal();
    }
    static public function mostrarIdLocal($param)
    {
        return LocalModel::getLocalId($param);
    }
    static public function listarLocalActivos()
    {
        return LocalModel::getLocalActivos();
    }
    static public function guardarLocal($locales)
    {
        return $locales->postLocal();
    }
    static public function actualizarLocal($locales)
    {
        return $locales->putLocal();
    }
    static public function eliminarSede($param,$enabled)
    {
        return LocalModel::deleteSede($param,$enabled);
    }
}
?>