<?php
require_once '../../src/Controller/subtipoController.php';
require_once '../../src/Repository/subtipoRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class SubTipoAjax
{
    public function ajaxCrudSubtipo()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textSubTipo'] != null || $_POST['textAbrevSubTipo'] != null || $_POST['selectTipos'] != null) {
                $modelSubtipo = new SubtipoModel(null, $_POST['textSubTipo'], $_POST['textAbrevSubTipo'], $_POST['selectTipos']);
                $respSubtipo = SubTipoController::guardarSubTipo($modelSubtipo);
                if (!isset($respSubtipo)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respSubtipo['message'])) {
                        $response = $respSubtipo;
                    } else {
                        $response = $respSubtipo;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacíos');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null || $_POST['textSubTipo'] != null || $_POST['textAbrevSubTipo'] != null || $_POST['selectTipos'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelSubtipo = new SubtipoModel($param, $_POST['textSubTipo'], $_POST['textAbrevSubTipo'], $_POST['selectTipos']);
                $respSubtipo = SubTipoController::actualizarSubTipo($modelSubtipo);
                if (!isset($respSubtipo)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respSubtipo['message'])) {
                        $response = $respSubtipo;
                    } else {
                        $response = $respSubtipo;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respSubtipo = SubTipoController::mostrarIdSubTipo($param);
            if (!isset($respSubtipo)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respSubtipo['status']) {
                    $response = array(
                        "status"      => true,
                        "id"          => Openssl::encriptar($respSubtipo['data']['id'], $_ENV['SECRET_KEY']),
                        "description" => $respSubtipo['data']['description'],
                        "abbreviation" => $respSubtipo['data']['abbreviation'],
                        "type"        => $respSubtipo['data']['type']['id']
                    );
                } else {
                    $response = $respSubtipo;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getSubTipo") {
            $response = SubTipoController::listarSubTipoActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getSubTiposxTipos") {
            $param = $_POST['idtipo'];
            $response = SubTipoController::SubTiposxTipoActivos($param);
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respSubtipo = SubTipoController::eliminarSubTipo($param, $_POST['enabled']);
            if (!isset($respSubtipo)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respSubtipo['message'])) {
                    $response = $respSubtipo;
                } else {
                    $response = $respSubtipo;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new SubTipoAjax;
$resp->ajaxCrudSubtipo();
