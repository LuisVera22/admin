<?php
require_once '../../src/Controller/rolController.php';
require_once '../../src/Repository/rolRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class RolAjax
{
    public function ajaxCrudRol()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textDescripcion'] != null) {
                $modelroles = new rolModel(null, $_POST['textDescripcion']);
                $resproles  = RolController::guardarRol($modelroles);
                if (!isset($resproles)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($resproles['message'])) {
                        $response =  $resproles;
                    } else {
                        $response =  $resproles;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null ||  $_POST['textDescripcion'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelroles = new RolModel($param, $_POST['textDescripcion']);
                $resproles = RolController::actualizarRol($modelroles);
                if (!isset($resproles)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($resproles['message'])) {
                        $response =  $resproles;
                    } else {
                        $response =  $resproles;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $resproles = RolController::mostrarIdRol($param);
            if (!isset($resproles)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($resproles['status']) {
                    $response   = array(
                        "status" =>  true,
                        "id"    =>  Openssl::encriptar($resproles['data']['id'], $_ENV['SECRET_KEY']),
                        "description"  =>  $resproles['data']['description']
                    );
                } else {
                    $response =  $resproles;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getRoles") {
            $response = RolController::listarRolActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $resproles = RolController::eliminarRol($param, $_POST['enabled']);
            if (!isset($resproles)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($resproles['message'])) {
                    $response =  $resproles;
                } else {
                    $response =  $resproles;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new RolAjax;
$resp->ajaxCrudRol();
?>