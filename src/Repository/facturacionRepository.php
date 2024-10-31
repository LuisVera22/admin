<?php
require_once '../../src/Model/facturacionModel.php';
require_once '../../src/Interface/facturacionInterface.php';

class FacturacionRepository implements FacturacionInterface
{
    static public function mostrarDatosCotizacion($arrays_id)
    {
        return FacturacionModel::getViewCotizacion($arrays_id);
    }
}
?>