<?php
require_once '../../src/Repository/cajachicaRepository.php';
require_once '../../src/Controller/cajachicaController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class CajachicaAjax
{
    public function ajaxCrudCajachica() {
        if(isset($_POST['crud']) && $_POST['crud'] == "create") {
            if (!empty($_POST['textDescription']) && !empty($_POST['amount']) && !empty($_FILES['imgCajachica']['name'])) {
                $descripcion = $_POST['textDescription'];
                $monto = $_POST['amount'];
                $file = $_FILES['imgCajachica'];
                $mimetype = $file['type'];

                if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png'){
                    $response = CajachicaController::guardarCajaChica();
                } else {
                    $response = array('reponseJson' => 'no imagen');
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCajachica = CajachicaController::mostrarIdCajachica($param);
            if(!isset($respCajachica)){
                $response = array('responseJson'=>"no server");
            } else {
                if ($respCajachica['status']) {
                    $response = array(
                        "id"            => Openssl::encriptar($respCajachica['data']['id'], $_ENV['SECRET_KEY']),
                        "date"          => $respCajachica['data']['date'],
                        "time"          => $respCajachica['data']['time'],
                        "description"   => $respCajachica['data']['description'],
                        "amount"        => $respCajachica['data']['amount'],
                        "username"      => $respCajachica['data']['username'],
                        "img_petty_cash_name" => $respCajachica['data']['img_petty_cash_name']
                    );
                } else {
                    $response = $respCajachica;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getIdInfo") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCajachica = CajachicaController::mostrarIdCajachica($param);
            if(!isset($respCajachica)){
                $response = array('responseJson'=>"no server");
            } else {
                if ($respCajachica['status']) {
                    $response = array(
                        "id"            => Openssl::encriptar($respCajachica['data']['id'], $_ENV['SECRET_KEY']),
                        "date"          => $respCajachica['data']['date'],
                        "time"          => $respCajachica['data']['time'],
                        "description"   => $respCajachica['data']['description'],
                        "amount"        => $respCajachica['data']['amount'],
                        "username"      => $respCajachica['data']['username'],
                        "img_petty_cash_name" => $respCajachica['data']['img_petty_cash_name']
                    );
                } else {
                    $response = $respCajachica;
                }
            }
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