<?php
class EmpresaController
{
    static public function mostrarEmpresa()
    {
        return EmpresaRepository::mostrarEmpresa();
    }
    static public function guardarEmpresa($empresa)
    {
        return EmpresaRepository::guardarEmpresa($empresa);
    }
    static public function actualizarEmpresa($empresa)
    {
        return EmpresaRepository::actualizarEmpresa($empresa);
    }
    static public function actualizarImagen($param, $file)
    {
        return EmpresaRepository::actualizarImagen($param, $file);
    }
}
