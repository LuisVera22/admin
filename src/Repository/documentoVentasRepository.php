<?php
require_once '../../src/Model/documentoVentasModel.php';
require_once '../../src/Interface/documentoVentasInterface.php';

class DocumentoVentasRepository implements DocumentoVentasInterface
{
    static public function mostrarDocumentoVentas()
    {
        return DocumentoVentasModel::getDocumentoVentas();
    }
    static public function mostrarIdDocumentoVentas($param)
    {
        return DocumentoVentasModel::getDocumentoVentasId($param);
    }
    static public function listarDocumentoVentasActivos()
    {
        return DocumentoVentasModel::getDocumentoVentasActivos();
    }
    static public function guardarDocumentoVentas($documentoVentas)
    {
        return $documentoVentas->postDocumentoVentas();
    }
    static public function actualizarDocumentoVentas($documentoVentas)
    {
        return $documentoVentas->putDocumentoVentas();
    }
    static public function eliminarDocumentoVentass($param,$enabled)
    {
        return DocumentoVentasModel::deleteDocumentoVentas($param,$enabled);
    }
    static public function DocumentVentasxCorrelativos($param)
    {
        return DocumentoVentasModel::getDocumentVentasxCorrelativos($param);
    }
}
?>