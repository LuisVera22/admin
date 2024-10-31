<?php
class TipoDocumentoController
{
    static public function mostrarTipoDocumento()
    {
        return TipoDocumentoRepository::mostrarTipoDocumento();
    }
    static public function mostrarIdTipoDocumento($param)
    {
        return TipoDocumentoRepository::mostrarIdTipoDocumento($param);
    }
    static public function listarTipoDocumentoActivos()
    {
        return TipoDocumentoRepository::listarTipoDocumentoActivos();
    }
    static public function guardarTipoDocumento($tipodocumento)
    {
        return TipoDocumentoRepository::guardarTipoDocumento($tipodocumento);
    }
    static public function actualizarTipoDocumento($tipodocumento)
    {
        return TipoDocumentoRepository::actualizarTipoDocumento($tipodocumento);
    }
    static public function eliminarTipoDocumento($param,$enabled)
    {
        return TipoDocumentoRepository::eliminarTipoDocumento($param,$enabled);
    }
}
?>