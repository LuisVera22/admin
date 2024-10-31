<?php
require_once '../../src/Controller/tipoController.php';
require_once '../../src/Repository/tipoRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class TipoAjax
{
    public function ajaxCrudTipo()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textTipo'] != null || $_POST['textAbrevTipo'] != null && $_POST['selecttypemanufacturing'] != null) {
                $modelTipo = new TipoModel(null, $_POST['textTipo'], $_POST['textAbrevTipo'], $_POST['selecttypemanufacturing']);
                $respTipo = TipoController::guardarTipo($modelTipo);
                if (!isset($respTipo)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respTipo['message'])) {
                        $response = $respTipo;
                    } else {
                        $response = $respTipo;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacíos');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null || $_POST['textTipo'] != null || $_POST['textAbrevTipo'] != null && $_POST['selecttypemanufacturing'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelTipo = new TipoModel($param, $_POST['textTipo'], $_POST['textAbrevTipo'], $_POST['selecttypemanufacturing']);
                $respTipo = TipoController::actualizarTipo($modelTipo);
                if (!isset($respTipo)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respTipo['message'])) {
                        $response = $respTipo;
                    } else {
                        $response = $respTipo;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respTipo = TipoController::mostrarIdTipo($param);
            if (!isset($respTipo)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respTipo['status']) {
                    $response = array(
                        "status"            => true,
                        "id"                => Openssl::encriptar($respTipo['data']['id'], $_ENV['SECRET_KEY']),
                        "description"       => $respTipo['data']['description'],
                        "abbreviation"      => $respTipo['data']['abbreviation'],
                        "typemanufacturing" => $respTipo['data']['typemanufacturing']['id'],
                    );
                } else {
                    $response = $respTipo;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getTipos") {
            $response = TipoController::listarTipoActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getManufactxTipos") {
            $response = TipoController::listarManufacturaxTipoActivos($_POST['idtipo']);
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getManufactxAlmacen") {
            $response = TipoController::listarManufacturaxAlmacen($_POST['tipo'], $_POST['local']);
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respTipo = TipoController::eliminarTipo($param, $_POST['enabled']);
            if (!isset($respTipo)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respTipo['message'])) {
                    $response = $respTipo;
                } else {
                    $response = $respTipo;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new TipoAjax;
$resp->ajaxCrudTipo();
