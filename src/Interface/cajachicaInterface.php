<?php

interface CajachicaInterface
{
    static public function mostrarCajachica();
    static public function mostrarIdCajachica($param);
    static public function guardarCajachica(cajachicaModel $cajachica, $file);
    static public function actualizarCajachica(CajachicaModel $cajachica, $file, $img_petty_cash_name);
    static public function eliminarCajachica($param);
}