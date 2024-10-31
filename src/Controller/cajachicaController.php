<?php
class CajachicaController
{
    static public function mostrarCajachica(){
        return CajachicaRepository::mostrarCajachica();
    }

    static public function mostrarIdCajachica($param){
        return CajachicaRepository::mostrarIdCajachica($param);
    }

    static public function guardarCajaChica(CajachicaModel $cajachica){
        return  CajachicaRepository::guardarCajachica($cajachica);
    }

    static public function actualizarCajachica(CajachicaModel $cajachica){
        return CajachicaRepository::actualizarCajachica($cajachica);
    }

    static public function eliminarCajachica($param){
        return CajachicaRepository::eliminarCajachica($param);
    }
}