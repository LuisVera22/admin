<?php

interface CajachicaInterface
{
    static public function mostrarCajachica();
    static public function mostrarIdCajachica($param);
    static public function guardarCajachica(cajachicaModel $cajachica);
    static public function actualizarCajachica(CajachicaModel $cajachica);
    static public function eliminarCajachica($param);
}