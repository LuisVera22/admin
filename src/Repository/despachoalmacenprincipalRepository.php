<?php
require_once '../../src/Model/despachoalmacenprincipalModel.php';
require_once '../../src/Interface/despachoalmacenprincipalInterface.php';

class DespachoalmacenprincipalRepository implements DespachoalmacenprincipalInterface
{
    static public function guardarDespachoalmacenprincipal($despachoalmacenprincipal)
    {
        return $despachoalmacenprincipal->postDespachoalmacenprincipal();
    }
}