<?php
require_once '../../src/Controller/claseController.php';
require_once '../../src/Repository/claseRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class ClaseAjax
{
    public function ajaxCrudClases()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textClase'] != null && $_POST['textAbrevClase'] != null && $_POST['selectMateriales'] != null) {
                $modelClases = new ClaseModel(null, $_POST['textClase'], $_POST['textAbrevClase'], $_POST['selectMateriales']);
                $respClases = ClaseController::guardarClases($modelClases);
                if (!isset($respClases)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respClases['message'])) {
                        $response = $respClases;
                    } else {
                        $response = $respClases;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null && $_POST['textClase'] != null && $_POST['textAbrevClase'] != null && $_POST['selectMateriales'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelClases = new ClaseModel($param, $_POST['textClase'], $_POST['textAbrevClase'], $_POST['selectMateriales']);
                $respClases = ClaseController::actualizarClases($modelClases);
                if (!isset($respClases)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respClases['message'])) {
                        $response = $respClases;
                    } else {
                        $response = $respClases;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respClases = ClaseController::mostrarIdClases($param);
            if (!isset($respClases)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respClases['status']) {
                    $response = array(
                        "status"        => true,
                        "id"            => Openssl::encriptar($respClases['data']['id'], $_ENV['SECRET_KEY']),
                        "description"   => $respClases['data']['description'],
                        "abbreviation"   => $respClases['data']['abbreviation'],
                        "materials"     => $respClases['data']['materials']['id']
                    );
                } else {
                    $response = $respClases;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getClases") {
            $response = ClaseController::listarClasesActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getClasexMaterial") {
            $response = ClaseController::listarClasexMaterialActivos($_POST['idmaterial']);
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respClases = ClaseController::eliminarClases($param, $_POST['enabled']);
            if (!isset($respClases)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respClases['clases'])) {
                    $response = $respClases;
                } else {
                    $response = $respClases;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new ClaseAjax;
$resp->ajaxCrudClases();
?>