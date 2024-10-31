<?php
require_once '../../src/Controller/sedeController.php';
require_once '../../src/Repository/sedeRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class SedeAjax
{
    public function ajaxCrudSede()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textDescripcion'] != null) {
                $modelSedes = new SedeModel(null, $_POST['textDescripcion']);
                $respSedes  = SedeController::guardarSede($modelSedes);
                if (!isset($respSedes)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respSedes['message'])) {
                        $response =  $respSedes;
                    } else {
                        $response =  $respSedes;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null ||  $_POST['textDescripcion'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelSedes = new SedeModel($param, $_POST['textDescripcion']);
                $respSedes = SedeController::actualizarSede($modelSedes);
                if (!isset($respSedes)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respSedes['message'])) {
                        $response =  $respSedes;
                    } else {
                        $response =  $respSedes;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respSedes = SedeController::mostrarIdSede($param);
            if (!isset($respSedes)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respSedes['status']) {
                    $response   = array(
                        "status"        =>  true,
                        "id"            =>  Openssl::encriptar($respSedes['data']['id'], $_ENV['SECRET_KEY']),
                        "description"   =>  $respSedes['data']['description']
                    );
                } else {
                    $response =  $respSedes;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getSedes") {
            $response = SedeController::listarSedeActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respSedes = SedeController::eliminarSede($param, $_POST['enabled']);
            if (!isset($respSedes)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respSedes['message'])) {
                    $response =  $respSedes;
                } else {
                    $response =  $respSedes;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new SedeAjax;
$resp->ajaxCrudSede();
?>