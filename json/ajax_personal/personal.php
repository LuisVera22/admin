<?php
require_once '../../src/Controller/personalController.php';
require_once '../../src/Repository/personalRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class PersonalAjax
{
    public function ajaxCrudPersonal()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['selectTipoDocumento'] != null || $_POST['textNDocumento'] != null || $_POST['textNombre'] != null || $_POST['textApellido'] != null || $_POST['selectSede'] != null || $_POST['selectRolPersonal'] != null) {
                $modelPersonal = new PersonalModel(null, $_POST['textNombre'], $_POST['textApellido'], $_POST['textNDocumento'], $_POST['textContacto'], $_POST['textDireccion'], $_POST['selectTipoDocumento'], $_POST['selectSede'], $_POST['selectRolPersonal'], $_POST['textUsuario'], $_POST['textPassword'],$_POST['textCorreo']);
                $respPersonal  = PersonalController::guardarPersonal($modelPersonal);
                if (!isset($respPersonal)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respPersonal['message'])) {
                        $response =  $respPersonal;
                    } else {
                        $response =  $respPersonal;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['selectTipoDocumento'] != null || $_POST['textNDocumento'] != null || $_POST['textNombre'] != null || $_POST['textApellido'] != null || $_POST['selectSede'] != null || $_POST['selectRolPersonal'] != null) {
                $desencriptar = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelPersonal = new PersonalModel($desencriptar, $_POST['textNombre'], $_POST['textApellido'], $_POST['textNDocumento'], $_POST['textContacto'], $_POST['textDireccion'], $_POST['selectTipoDocumento'], $_POST['selectSede'], $_POST['selectRolPersonal'], $_POST['textUsuario'], $_POST['textPassword'],$_POST['textCorreo']);
                $respPersonal  = PersonalController::actualizarPersonal($modelPersonal);
                if (!isset($respPersonal)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respPersonal['message'])) {
                        $response =  $respPersonal;
                    } else {
                        $response =  $respPersonal;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listId') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respPersonal = PersonalController::mostrarIdPersonal($param);
            if (!isset($respPersonal)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respPersonal['status']) {
                    $response   = array(
                        "status"            =>  true,
                        "id"                =>  Openssl::encriptar($respPersonal['data']['id'], $_ENV['SECRET_KEY']),
                        "name"              =>  $respPersonal['data']['name'],
                        "lastname"          =>  $respPersonal['data']['lastname'],
                        "number_document"   =>  $respPersonal['data']['number_document'],
                        "address"           =>  $respPersonal['data']['address'],
                        "email"             =>  isset($respPersonal['data']['email']) ? $respPersonal['data']['email'] : null,
                        "cell_phone"        =>  $respPersonal['data']['cell_phone'],
                        "typedocumentId"    =>  $respPersonal['data']['typedocument']['id'],
                        "storeId"           =>  $respPersonal['data']['store']['id'],
                        "roleId"            =>  $respPersonal['data']['user']['role']['id'],
                        "username"          =>  $respPersonal['data']['user']['username'],
                    );
                } else {
                    $response =  $respPersonal;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getIdInfo') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respPersonal = PersonalController::mostrarIdPersonal($param);
            if (!isset($respPersonal)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respPersonal['status']) {
                    $response   = array(
                        "status"            =>  true,
                        "id"                =>  Openssl::encriptar($respPersonal['data']['id'], $_ENV['SECRET_KEY']),
                        "name"              =>  $respPersonal['data']['name'],
                        "lastname"          =>  $respPersonal['data']['lastname'],
                        "number_document"   =>  $respPersonal['data']['number_document'],
                        "address"           =>  $respPersonal['data']['address'],
                        "email"             =>  $respPersonal['data']['email'],
                        "cell_phone"        =>  $respPersonal['data']['cell_phone'],
                        "typedocument"      =>  $respPersonal['data']['typedocument']['description'],
                        "store"             =>  $respPersonal['data']['store']['address'],
                        "headquarters"      =>  $respPersonal['data']['store']['headquarters']['description'],
                        "role"              =>  $respPersonal['data']['user']['role']['description'],
                        "username"          =>  $respPersonal['data']['user']['username'],
                    );
                } else {
                    $response =  $respPersonal;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respPersonal = PersonalController::eliminarPersonal($param, $_POST['enabled']);
            if (!isset($respPersonal)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respPersonal['message'])) {
                    $response =  $respPersonal;
                } else {
                    $response =  $respPersonal;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listRolMensajero') {
            $response = PersonalController::mostrarRolPersonal($_POST['rol']);
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listRolVendedor') {
            $response = PersonalController::mostrarRolPersonal($_POST['rol']);
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new PersonalAjax;
$resp->ajaxCrudPersonal();
