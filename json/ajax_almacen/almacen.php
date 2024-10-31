<?php
require_once '../../src/Controller/almacenController.php';
require_once '../../src/Repository/almacenRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class AlmacenAjax
{
    public function ajaxCrudAlmacen()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "createStck") {
            if ($_POST['selectTrabajo'] != null && $_POST['selectManufactura'] != null && $_POST['selectProductos'] != null && $_POST['selectTipoCombinacion'] != null) {

                $modelAlmacen = new AlmacenModel(null, $_POST['selectProductos'], $_POST['selectTipoCombinacion'], $_POST['selectManufactura'], $_POST['textBase'], $_POST['textDiametro']);
                $respAlmacen  = AlmacenController::guardarAlmacen($modelAlmacen);
                if (!isset($respAlmacen)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respAlmacen['message'])) {
                        $response =  $respAlmacen;
                    } else {
                        $response =  $respAlmacen;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "createDig") {
            if ($_POST['selectTrabajo'] != null && $_POST['selectManufacturaDig'] != null && $_POST['selectProductosDig'] != null && $_POST['selectTipoCombinacionDig'] != null) {

                $modelAlmacen = new AlmacenModel(null, $_POST['selectProductosDig'], $_POST['selectTipoCombinacionDig'], $_POST['selectManufacturaDig'], $_POST['textBase'], $_POST['textDiametro']);
                $respAlmacen  = AlmacenController::guardarAlmacen($modelAlmacen);
                if (!isset($respAlmacen)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respAlmacen['message'])) {
                        $response =  $respAlmacen;
                    } else {
                        $response =  $respAlmacen;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "createConv") {
            if ($_POST['selectTrabajo'] != null && $_POST['selectManufacturaConv'] != null && $_POST['selectProductosConv'] != null && $_POST['selectTipoCombinacionConv'] != null) {

                $modelAlmacen = new AlmacenModel(null, $_POST['selectProductosConv'], $_POST['selectTipoCombinacionConv'], $_POST['selectManufacturaConv'], $_POST['textBase'], $_POST['textDiametro']);
                $respAlmacen  = AlmacenController::guardarAlmacen($modelAlmacen);
                if (!isset($respAlmacen)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respAlmacen['message'])) {
                        $response =  $respAlmacen;
                    } else {
                        $response =  $respAlmacen;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listId') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respAlmacen = AlmacenController::mostrarIdAlmacen($param);
            if (!isset($respAlmacen)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respAlmacen['status']) {
                    $response   = array(
                        "status"            =>  true,
                        "id"                =>  Openssl::encriptar($respAlmacen['data']['id'], $_ENV['SECRET_KEY']),
                        "quantity"          =>  $respAlmacen['data']['storehousexstore']['quantity']
                    );
                } else {
                    $response =  $respAlmacen;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respAlmacen = AlmacenController::eliminarAlmacen($param, $_POST['enabled']);
            if (!isset($respAlmacen)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respAlmacen['message'])) {
                    $response =  $respAlmacen;
                } else {
                    $response =  $respAlmacen;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getAlmacenxManufact") {
            $response = AlmacenController::listarAlmacenxManufactura($_POST['tipo']);
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new AlmacenAjax;
$resp->ajaxCrudAlmacen();
