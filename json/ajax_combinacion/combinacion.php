<?php
require_once '../../src/Repository/combinacionRepository.php';
require_once '../../src/Controller/combinacionController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class CombinacionAjax
{
    public function ajaxCrudCommbinacion()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {

            !empty($_POST['selectEsf']) ? $esf = "ESF: " . $_POST['selectEsf'] : $esf = null;
            !empty($_POST['selectCil']) ? $cil = " CIL: " . $_POST['selectCil'] : $cil = null;
            !empty($_POST['selectAdd']) ? $add = " ADD: " . $_POST['selectAdd'] : $add = null;

            $desciption = $esf . $cil . $add;
            $modelCombinacion = new CombinacionModel(null, $desciption, $_POST['selectEsf'], $_POST['selectCil'], $_POST['selectAdd']);
            $respCombinacion = CombinacionController::guardarCombinacion($modelCombinacion);
            if (!isset($respCombinacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCombinacion['message'])) {
                    $response =  $respCombinacion;
                } else {
                    $response =  $respCombinacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCombinacion = CombinacionController::mostrarIdCombinacion($param);
            if (!isset($respCombinacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respCombinacion['status']) {
                    $response = array(
                        "status"    => true,
                        "id"        => Openssl::encriptar($respCombinacion['data']['id'], $_ENV['SECRET_KEY']),
                        "esf"       => $respCombinacion['data']['esf'],
                        "cil"       => $respCombinacion['data']['cil'],
                        "add"       => $respCombinacion['data']['add']
                    );
                } else {
                    $response = $respCombinacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCombinacion = CombinacionController::eliminarCombinacion($param, $_POST['enabled']);
            if (!isset($respCombinacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCombinacion['message'])) {
                    $response =  $respCombinacion;
                } else {
                    $response =  $respCombinacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getCombinacion") {
            $response = CombinacionController::listarCombinacionActivo();
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new CombinacionAjax;
$resp->ajaxCrudCommbinacion();
?>