<?php
interface TipoDocumentoInterface
{
    static public function mostrarTipoDocumento();
    static public function mostrarIdTipoDocumento($param);
    static public function listarTipoDocumentoActivos();
    static public function guardarTipoDocumento(TipoDocumentoModel $tipoDocumento);
    static public function actualizarTipoDocumento(TipoDocumentoModel $tipodocumento);
    static public function eliminarTipoDocumento($param,$enabled);
}
?>