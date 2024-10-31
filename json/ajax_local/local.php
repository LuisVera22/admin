<?php
require_once '../../src/Controller/localController.php';
require_once '../../src/Repository/localRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class LocalAjax
{
    public function ajaxCrudLocal()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['selectSede'] != null || $_POST['address'] != null) {
                if (isset($_POST['CheckLocalPrincipal']) &&  $_POST['CheckLocalPrincipal'] == 'on') {
                    $main = 1;
                } else {
                    $main = null;
                }
                $desencriptarBuissnes = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelLocales = new LocalModel(null, $_POST['address'], $_POST['call1'], $_POST['call2'], $_POST['call3'], $main, $desencriptarBuissnes, $_POST['selectSede']);
                $respLocales  = LocalController::guardarLocal($modelLocales);
                if (!isset($respLocales)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respLocales['message'])) {
                        $response =  $respLocales;
                    } else {
                        $response =  $respLocales;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['selectSede'] != null || $_POST['address'] != null) {
                if (isset($_POST['CheckLocalPrincipal2']) && $_POST['CheckLocalPrincipal2']) {
                    $main = 1;
                } else {
                    $main = 0;
                }
                $desencriptar = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelLocales = new LocalModel($desencriptar, $_POST['address'], $_POST['call1'], $_POST['call2'], $_POST['call3'],$main, null, $_POST['selectSede']);
                $respLocales  = LocalController::actualizarLocal($modelLocales);
                if (!isset($respLocales)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respLocales['message'])) {
                        $response =  $respLocales;
                    } else {
                        $response =  $respLocales;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listId') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respLocales = LocalController::mostrarIdLocal($param);
            if (!isset($respLocales)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respLocales['status']) {
                    $response   = array(
                        "status"            =>  true,
                        "id"                =>  Openssl::encriptar($respLocales['data']['id'], $_ENV['SECRET_KEY']),
                        "address"           =>  $respLocales['data']['address'],
                        "phone"             =>  $respLocales['data']['phone'],
                        "phone_2"           =>  $respLocales['data']['phone_2'],
                        "phone_3"           =>  $respLocales['data']['phone_3'],
                        "main"              =>  $respLocales['data']['main'],
                        "headquartersId"    =>  $respLocales['data']['headquarters']['id'],
                    );
                } else {
                    $response =  $respLocales;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getIdInfo') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respLocales = LocalController::mostrarIdLocal($param);
            if (!isset($respLocales)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respLocales['status']) {
                    $response   = array(
                        "status"            =>  true,
                        "address"           =>  $respLocales['data']['address'],
                        "phone"             =>  $respLocales['data']['phone'],
                        "phone_2"           =>  $respLocales['data']['phone'],
                        "phone_3"           =>  $respLocales['data']['phone'],
                        "headquarters"      =>  $respLocales['data']['headquarters']['description'],
                    );
                } else {
                    $response =  $respLocales;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getLocales') {
            $response = LocalController::listarLocalActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respSedes = LocalController::eliminarSede($param, $_POST['enabled']);
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
$resp = new LocalAjax;
$resp->ajaxCrudLocal();
