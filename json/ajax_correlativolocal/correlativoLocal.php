<?php
require_once '../../src/Repository/correlativolocalRepository.php';
require_once '../../src/Controller/correlativolocalController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class CorrelativoLocalAjax
{
    public function ajaxCrudCorrelativoLocal()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['param'] !=null || $_POST['selectDocumentoventa'] != null || $_POST['selectSerie'] != null || $_POST['textInicioNum'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelcorrelaticolocal = new CorrelativoLocalModel(null,$_POST['selectSerie'],$param);
                $respCorrelativoLocal = CorrelativoLocalController::guardarCorrelativoLocal($modelcorrelaticolocal);
                if (!isset($respCorrelativoLocal)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respCorrelativoLocal['message'])) {
                        $response =  $respCorrelativoLocal;
                    } else {
                        $response =  $respCorrelativoLocal;
                    }
                }
            }else{
                $response = array('responseJson' => 'no vacios');
            }
        }else{
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new CorrelativoLocalAjax;
$resp->ajaxCrudCorrelativoLocal();
?>