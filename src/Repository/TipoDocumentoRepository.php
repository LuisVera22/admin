<?php
require_once '../../src/Model/tipoDocumentoModel.php';
require_once '../../src/Interface/tipoDocumentoInterface.php';
class TipoDocumentoRepository implements TipoDocumentoInterface
{
    static public function mostrarTipoDocumento()
    {
        return TipoDocumentoModel::getTipoDocumento();
    }
    static public function mostrarIdTipoDocumento($param)
    {
        return TipoDocumentoModel::getTipoDocumentoId($param);
    }
    static public function listarTipoDocumentoActivos()
    {
        return TipoDocumentoModel::getTipoDocumentoActivos();
    }
    static public function guardarTipoDocumento($tipodocumento)
    {
        return $tipodocumento->postTipoDocumento();
    }
    static public function actualizarTipoDocumento($tipodocumento)
    {
        return $tipodocumento->putTipoDocumento();
    }
    static public function eliminarTipoDocumento($param,$enabled)
    {
        return TipoDocumentoModel::deleteTipoDocumento($param,$enabled);
    }
}
?>