<?php
class FacturacionController
{
    static public function mostrarDatosCotizacion($arrays_id)
    {
        return FacturacionRepository::mostrarDatosCotizacion($arrays_id);
    }
}
?>