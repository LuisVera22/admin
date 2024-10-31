<?php
interface EmpresaInterface
{
    static public function mostrarEmpresa();
    static public function guardarEmpresa(EmpresaModel $empresa);
    static public function actualizarEmpresa(EmpresaModel $empresa);
    static public function actualizarImagen($param, $file);
}
?>