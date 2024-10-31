<?php
require_once '../../src/Controller/subclaseController.php';
require_once '../../src/Repository/subclaseRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class SubClaseAjax
{
    public function ajaxCrudSubClases()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textSubClase'] != null) {
                $modelSubclases = new SubClaseModel(null, $_POST['textSubClase'], $_POST['selectClases']);
                $respSubclases = SubClaseController::guardarSubClases($modelSubclases);
                if (!isset($respSubclases)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respSubclases['message'])) {
                        $response = $respSubclases;
                    } else {
                        $response = $respSubclases;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null || $_POST['textSubClase'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelSubclases = new SubClaseModel($param, $_POST['textSubClase'], $_POST['selectClases']);
                $respSubclases = SubClaseController::actualizarSubClases($modelSubclases);
                if (!isset($respSubclases)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respSubclases['message'])) {
                        $response = $respSubclases;
                    } else {
                        $response = $respSubclases;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respSubclases = SubClaseController::mostrarIdSubClases($param);
            if (!isset($respSubclases)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respSubclases['status']) {
                    $response = array(
                        "status"        => true,
                        "id"            => Openssl::encriptar($respSubclases['data']['id'], $_ENV['SECRET_KEY']),
                        "description"   => $respSubclases['data']['description'],
                        "classes"       => $respSubclases['data']['classes']['id'],
                    );
                } else {
                    $response = $respSubclases;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getSubClases") {
            $response = SubClaseController::listarSubClasesActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getSubClasexClase") {
            $response = SubClaseController::listarSubClasexClaseActivos($_POST['idclase']);
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respSubclases = SubClaseController::eliminarSubClases($param, $_POST['enabled']);
            if (!isset($respSubclases)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respSubclases['clases'])) {
                    $response = $respSubclases;
                } else {
                    $response = $respSubclases;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new SubClaseAjax;
$resp->ajaxCrudSubClases();
?>