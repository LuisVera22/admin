<?php
require_once '../../src/Repository/cajachicaRepository.php';
require_once '../../src/Controller/cajachicaController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class CajachicaAjax
{
    public function ajaxCrudCajachica() {
        if(isset($_POST['crud']) && $_POST['crud'] == "create") {

        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {

        } else if (isset($_POST['crud']) && $_POST['crud'] == "getIdInfo") {

        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCajachica = CajachicaController::eliminarCajachica($param);
            if(!isset($respCajachica)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCajachica['message'])) {
                    $response = $respCajachica;
                } else {
                    $response = $respCajachica;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getCajachica') {
            $response = CajachicaController::mostrarCajachica();
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new CajachicaAjax();
$resp->ajaxCrudCajachica(); 