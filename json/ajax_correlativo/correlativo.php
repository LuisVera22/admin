<?php
require_once '../../src/Repository/correlativoRepository.php';
require_once '../../src/Controller/correlativoController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class CorrelativoAjax
{
    public function ajaxCrudCorrelativo()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['selectDocumentoventa'] != null || $_POST['textSerie'] != null || $_POST['textCorrelativo'] != null) {
                $modelCorrelativo = new CorrelativoModel(null, $_POST['textSerie'], $_POST['textCorrelativo'], $_POST['selectDocumentoventa']);
                $respCorrelativo = CorrelativoController::guardarCorrelativo($modelCorrelativo);
                if (!isset($respCorrelativo)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respCorrelativo['message'])) {
                        $response =  $respCorrelativo;
                    } else {
                        $response =  $respCorrelativo;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['selectDocumentoventa'] != null || $_POST['textSerie'] != null || $_POST['textCorrelativo'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelCorrelativo = new CorrelativoModel($param, $_POST['textSerie'], $_POST['textCorrelativo'], $_POST['selectDocumentoventa']);
                $respCorrelativo = CorrelativoController::actualizarCorrelativo($modelCorrelativo);
                if (!isset($respCorrelativo)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respCorrelativo['message'])) {
                        $response =  $respCorrelativo;
                    } else {
                        $response =  $respCorrelativo;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCorrelativo = CorrelativoController::mostrarIdCorrelativo($param);
            if (!isset($respCorrelativo)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respCorrelativo['status']) {
                    $response = array(
                        "status"            => true,
                        "id"                => Openssl::encriptar($respCorrelativo['data']['id'], $_ENV['SECRET_KEY']),
                        "serie"             => $respCorrelativo['data']['serie'],
                        "correlative"       => $respCorrelativo['data']['correlative'],
                        "documentsalesId"   => $respCorrelativo['data']['documentsales']['id']
                    );
                } else {
                    $response = $respCorrelativo;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCliente = CorrelativoController::eliminarCorrelativo($param, $_POST['enabled']);
            if (!isset($respCliente)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCliente['message'])) {
                    $response =  $respCliente;
                } else {
                    $response =  $respCliente;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getCorrelativo') {
            $response = CorrelativoController::mostrarIdCorrelativo($_POST['param']);
            if (!empty($response['data'])) {
                $response = $response['data'];
            } else {
                $response = array('responseJson' => "no vacios");
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new CorrelativoAjax;
$resp->ajaxCrudCorrelativo();
?>