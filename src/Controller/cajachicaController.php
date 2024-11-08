<?php
class CajachicaController
{
    static public function mostrarCajachica(){
        return CajachicaRepository::mostrarCajachica();
    }

    static public function mostrarIdCajachica($param){
        return CajachicaRepository::mostrarIdCajachica($param);
    }

    static public function guardarCajaChica(CajachicaModel $cajachica, $file){
        return  CajachicaRepository::guardarCajachica($cajachica, $file);
    }

    static public function actualizarCajachica(CajachicaModel $cajachica, $file, $img_petty_cash_name){
        return CajachicaRepository::actualizarCajachica($cajachica, $file, $img_petty_cash_name);
    }

    static public function eliminarCajachica($param){
        return CajachicaRepository::eliminarCajachica($param);
    }
}