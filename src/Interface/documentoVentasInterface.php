<?php
interface DocumentoVentasInterface
{
    static public function mostrarDocumentoVentas();
    static public function mostrarIdDocumentoVentas($param);
    static public function listarDocumentoVentasActivos();
    static public function guardarDocumentoVentas(DocumentoVentasModel $documentoVentas);
    static public function actualizarDocumentoVentas(DocumentoVentasModel $documentoVentas);
    static public function eliminarDocumentoVentass($param,$enabled);
    static public function DocumentVentasxCorrelativos($param);
}
?>