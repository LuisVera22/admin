<?php
require_once '../../src/Controller/facturacionController.php';
require_once '../../src/Repository/facturacionRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class FacturacionAjax
{
    public function ajaxCrudFacturacion()
    {
        if(isset($_POST['crud']) && $_POST['crud']=='getViewCotizacion'){
            $arrays_id = [];
            foreach ($_POST['arrays_id'] as $itemsArrays) {
                $params = Openssl::desencriptar($itemsArrays, $_ENV['SECRET_KEY']);
                $arrays_id[] = $params;

                $response = FacturacionController::mostrarDatosCotizacion($arrays_id);
            }
        }
        echo json_encode($response);
    }
}

$resp = new FacturacionAjax;
$resp->ajaxCrudFacturacion();
?>