<?php
class DespachoalmacenprincipalController
{
    static public function guardarDespachoalmacenprincipal(DespachoalmacenprincipalModel $despachoalmacenprincipal)
    {
        return DespachoalmacenprincipalRepository::guardarDespachoalmacenprincipal($despachoalmacenprincipal);
    }
}