<?php
require_once '../../src/Interface/empresaInterface.php';
require_once '../../src/Model/empresaModel.php';

class EmpresaRepository implements EmpresaInterface
{
    static public function mostrarEmpresa()
    {
        return EmpresaModel::getEmpresa();
    }

    static public function guardarEmpresa($empresa)
    {
        return $empresa->postEmpresa();
    }
    static public function actualizarEmpresa($empresa)
    {
        return $empresa->putEmpresa();
    }
    static public function actualizarImagen($param, $file)
    {
        return EmpresaModel::putImage($param, $file);
    }
}
