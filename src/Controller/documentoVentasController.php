<?php
class DocumentoVentasController
{
    static public function mostrarDocumentoVentas()
    {
        return DocumentoVentasRepository::mostrarDocumentoVentas();
    }
    static public function mostrarIdDocumentoVentas($param)
    {
        return DocumentoVentasRepository::mostrarIdDocumentoVentas($param);
    }
    static public function listarDocumentoVentasActivos()
    {
        return DocumentoVentasRepository::listarDocumentoVentasActivos();
    }
    static public function actualizarDocumentoVentas($param)
    {
        return DocumentoVentasRepository::actualizarDocumentoVentas($param);
    }
    static public function guardarDocumentoVentas($documentoVentas)
    {
        return DocumentoVentasRepository::guardarDocumentoVentas($documentoVentas);
    }
    static public function eliminarDocumentoVentass($param,$enabled)
    {
        return DocumentoVentasRepository::eliminarDocumentoVentass($param,$enabled);
    }
    static public function DocumentVentasxCorrelativos($param)
    {
        return DocumentoVentasRepository::DocumentVentasxCorrelativos($param);
    }
}
?>