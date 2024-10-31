<?php
require_once '../../src/Controller/documentoVentasController.php';
require_once '../../src/Repository/documentoVentasRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class DocumentoVentasAjax
{
    public function ajaxCrudDocumentosVentas()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textDescripcion'] != null || $_POST['textCodigoSunat'] != null) {
                $modelDocumentoVentas = new DocumentoVentasModel(null, $_POST['textDescripcion'], $_POST['textCodigoSunat']);
                $respDocumentoVentas = DocumentoVentasController::guardarDocumentoVentas($modelDocumentoVentas);
                if (!isset($respDocumentoVentas)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respDocumentoVentas['message'])) {
                        $response =  $respDocumentoVentas;
                    } else {
                        $response =  $respDocumentoVentas;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null ||  $_POST['textDescripcion'] != null || $_POST['textCodigoSunat'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelDocumentoVentas = new DocumentoVentasModel($param, $_POST['textDescripcion'], $_POST['textCodigoSunat']);
                $respDocumentoVentas = DocumentoVentasController::actualizarDocumentoVentas($modelDocumentoVentas);
                if (!isset($respDocumentoVentas)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respDocumentoVentas['message'])) {
                        $response =  $respDocumentoVentas;
                    } else {
                        $response =  $respDocumentoVentas;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respDocumentoVentas = DocumentoVentasController::mostrarIdDocumentoVentas($param);
            if (!isset($respDocumentoVentas)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respDocumentoVentas['status']) {
                    $response   = array(
                        "status"        =>  true,
                        "id"            =>  Openssl::encriptar($respDocumentoVentas['data']['id'], $_ENV['SECRET_KEY']),
                        "description"   =>  $respDocumentoVentas['data']['description'],
                        "code_sunat"    =>  $respDocumentoVentas['data']['code_sunat']
                    );
                } else {
                    $response =  $respDocumentoVentas;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getDocumentoVentas") {
            $response = DocumentoVentasController::listarDocumentoVentasActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respDocumentoVentas = DocumentoVentasController::eliminarDocumentoVentass($param, $_POST['enabled']);
            if (!isset($respDocumentoVentas)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respDocumentoVentas['message'])) {
                    $response =  $respDocumentoVentas;
                } else {
                    $response =  $respDocumentoVentas;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getDocumentxCorrelativo") {
            if ($_POST['param'] == null) {
                $response = array('responseJson' => 'no vacios');
            } else {
                $response = DocumentoVentasController::DocumentVentasxCorrelativos($_POST['param']);
                if (count($response['data']['correlative']) > 0) {
                    $response = $response['data']['correlative'];
                } else {
                    $response = array('responseJson' => 'no vacios');
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }

        echo json_encode($response);
    }
}
$resp = new DocumentoVentasAjax;
$resp->ajaxCrudDocumentosVentas();
