<?php
require_once '../../src/Model/salidaModel.php';
require_once '../../src/Interface/salidaInterface.php';

class SalidaRepository implements SalidaInterface
{
    static public function cargarSalida($data)
    {
        return SalidaModel::postCargarData($data);
    }
}