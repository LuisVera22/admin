<?php
class SalidaController
{
    static public function cargarSalida($data)
    {
        return SalidaRepository::cargarSalida($data);
    }
}