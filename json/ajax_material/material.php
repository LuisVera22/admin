<?php
require_once '../../src/Controller/materialController.php';
require_once '../../src/Repository/materialRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class MaterialAjax
{
    public function ajaxCrudMaterial()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textMaterial'] !== null && $_POST['textAbrevMaterial'] !== null && $_POST['selectTipos'] !== null && $_POST['selectSubTipos'] === "") {
                $modelMaterial = new MaterialModel(null, $_POST['textMaterial'], $_POST['textAbrevMaterial'], $_POST['selectTipos'], null);
                $respMaterial = MaterialController::guardarMateriales($modelMaterial);
                if (!isset($respMaterial)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respMaterial['message'])) {
                        $response = $respMaterial;
                    } else {
                        $response = $respMaterial;
                    }
                }
            } else if ($_POST['textMaterial'] !== null && $_POST['textAbrevMaterial'] !== null && $_POST['selectTipos'] !== null && $_POST['selectSubTipos'] != null) {
                $modelMaterial = new MaterialModel(null, $_POST['textMaterial'], $_POST['textAbrevMaterial'], $_POST['selectTipos'], $_POST['selectSubTipos']);
                $respMaterial = MaterialController::guardarMateriales($modelMaterial);
                if (!isset($respMaterial)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respMaterial['message'])) {
                        $response = $respMaterial;
                    } else {
                        $response = $respMaterial;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null && $_POST['textMaterial'] != null && $_POST['textAbrevMaterial'] != null && $_POST['selectTipos'] !== null && $_POST['selectSubTipos'] === "") {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelMaterial = new MaterialModel($param, $_POST['textMaterial'], $_POST['textAbrevMaterial'], $_POST['selectTipos'], null);
                $respMaterial = MaterialController::actualizarMateriales($modelMaterial);
                if (!isset($respMaterial)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respMaterial['message'])) {
                        $response = $respMaterial;
                    } else {
                        $response = $respMaterial;
                    }
                }
            } else if ($_POST['param'] != null && $_POST['textMaterial'] !== null && $_POST['textAbrevMaterial'] !== null && $_POST['selectTipos'] !== null && $_POST['selectSubTipos'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelMaterial = new MaterialModel($param, $_POST['textMaterial'], $_POST['textAbrevMaterial'], $_POST['selectTipos'], $_POST['selectSubTipos']);
                $respMaterial = MaterialController::actualizarMateriales($modelMaterial);
                if (!isset($respMaterial)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respMaterial['message'])) {
                        $response = $respMaterial;
                    } else {
                        $response = $respMaterial;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respMaterial = MaterialController::mostrarIdMateriales($param);
            if (!isset($respMaterial)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respMaterial['status']) {
                    $response = array(
                        "status"      => true,
                        "id"          => Openssl::encriptar($respMaterial['data']['id'], $_ENV['SECRET_KEY']),
                        "description" => $respMaterial['data']['description'],
                        "abbreviation" => $respMaterial['data']['abbreviation'],
                        "type"        => $respMaterial['data']['type']['id'],
                        "subtype"     => $respMaterial['data']['subtype'] != null ? $respMaterial['data']['subtype']['id'] : ""
                    );
                } else {
                    $response = $respMaterial;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getMateriales") {
            $response = MaterialController::listarMaterialesActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getMaterialxTipos") {
            $response = MaterialController::listarMaterialxTipoActivos($_POST['idtipo']);
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getMaterialxSubtipo") {
            $response = MaterialController::listarMaterialxSubTipoActivos($_POST['idsubtipo']);
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respMaterial = MaterialController::eliminarMateriales($param, $_POST['enabled']);
            if (!isset($respMaterial)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respMaterial['material'])) {
                    $response = $respMaterial;
                } else {
                    $response = $respMaterial;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new MaterialAjax;
$resp->ajaxCrudMaterial();
