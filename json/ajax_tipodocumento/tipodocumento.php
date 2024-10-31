<?php
require_once '../../src/Controller/tipoDocumentoController.php';
require_once '../../src/Repository/tipoDocumentoRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class TipoDocumentoAjax
{
    public function ajaxCrudTipoDocumento()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create"){
            if($_POST['textDescripcion']!=null || $_POST['textCodigoSunat']!=null){
                $modelTipoDocumentos = new TipoDocumentoModel(null,$_POST['textDescripcion'],$_POST['textCodigoSunat']);
                $respTipoDocumentos = TipoDocumentoController::guardarTipoDocumento($modelTipoDocumentos);
                if (!isset($respTipoDocumentos)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respTipoDocumentos['message'])) {
                        $response =  $respTipoDocumentos;
                    } else {
                        $response =  $respTipoDocumentos;
                    }
                }
            }else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null ||  $_POST['textDescripcion']!=null || $_POST['textCodigoSunat']!=null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelTipoDocumentos = new TipoDocumentoModel($param, $_POST['textDescripcion'],$_POST['textCodigoSunat']);
                $respTipoDocumentos = TipoDocumentoController::actualizarTipoDocumento($modelTipoDocumentos);
                if (!isset($respTipoDocumentos)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respTipoDocumentos['message'])) {
                        $response =  $respTipoDocumentos;
                    } else {
                        $response =  $respTipoDocumentos;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respTipoDocumentos = TipoDocumentoController::mostrarIdTipoDocumento($param);
            if (!isset($respTipoDocumentos)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respTipoDocumentos['status']) {
                    $response   = array(
                        "status"        =>  true,
                        "id"            =>  Openssl::encriptar($respTipoDocumentos['data']['id'], $_ENV['SECRET_KEY']),
                        "description"   =>  $respTipoDocumentos['data']['description'],
                        "code_sunat"    =>  $respTipoDocumentos['data']['code_sunat']
                    );
                } else {
                    $response =  $respTipoDocumentos;
                }
            }
        }else if (isset($_POST['crud']) && $_POST['crud'] == "getTipoDocumentos") {
            $response = TipoDocumentoController::listarTipoDocumentoActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respTipoDocumentos = TipoDocumentoController::eliminarTipoDocumento($param, $_POST['enabled']);
            if (!isset($respTipoDocumentos)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respTipoDocumentos['message'])) {
                    $response =  $respTipoDocumentos;
                } else {
                    $response =  $respTipoDocumentos;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new TipoDocumentoAjax;
$resp->ajaxCrudTipoDocumento();
?>