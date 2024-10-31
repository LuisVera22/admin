<?php
require_once '../../src/Controller/tipoManufacturaController.php';
require_once '../../src/Repository/tipoManufacturaRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class TipoManufacturaAjax
{
    public function ajaxCrudTipoManufactura()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textDescripcion'] != null || $_POST['textAbrev'] != null || $_POST['selectTrabajo'] != null) {
                $modelTipoManufactura = new TipoManufacturaModel(null, $_POST['textDescripcion'], $_POST['textAbrev'], $_POST['selectTrabajo']);
                $respTipoManufactura = TipoManufacturaController::guardarTipoManufactura($modelTipoManufactura);
                if (!isset($respTipoManufactura)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respTipoManufactura['message'])) {
                        $response =  $respTipoManufactura;
                    } else {
                        $response =  $respTipoManufactura;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respTipoManufactura = TipoManufacturaController::mostrarIdTipoManufactura($param);
            if (!isset($respTipoManufactura)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respTipoManufactura['status']) {
                    $response   = array(
                        "status"        =>  true,
                        "id"            =>  Openssl::encriptar($respTipoManufactura['data']['id'], $_ENV['SECRET_KEY']),
                        "description"   =>  $respTipoManufactura['data']['description'],
                    );
                } else {
                    $response =  $respTipoManufactura;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getTipoManufacturas") {
            $response = TipoManufacturaController::listarTipoManufacturaActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respTipoManufacturas = TipoManufacturaController::eliminarTipoManufactura($param, $_POST['enabled']);
            if (!isset($respTipoManufacturas)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respTipoManufacturas['message'])) {
                    $response =  $respTipoManufacturas;
                } else {
                    $response =  $respTipoManufacturas;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getManufactxTrabajo") {
            $response = TipoManufacturaController::listarManufacturaxTrabajo($_POST['tipo']);
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new TipoManufacturaAjax;
$resp->ajaxCrudTipoManufactura();
