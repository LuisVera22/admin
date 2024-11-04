<?php
require_once '../../src/Model/cajachicaModel.php';
require_once '../../src/Interface/cajachicaInterface.php';


class CajachicaRepository implements CajachicaInterface
{
    static public function mostrarCajachica()
    {
        return CajachicaModel::getCajachica();
    }

    static public function mostrarIdCajachica($param)
    {
        return CajachicaModel::getCajachicaId($param);
    }

    static public function guardarCajachica(CajachicaModel $cajachica, $file)
    {
        return $cajachica->postCajachica($file);
    }

    static public function actualizarCajachica(CajachicaModel $cajachica)
    {
        return $cajachica->putCajachica();
    }

    static public function eliminarCajachica($param)
    {
        return CajachicaModel::deleteCajachicaId($param);
    }
}