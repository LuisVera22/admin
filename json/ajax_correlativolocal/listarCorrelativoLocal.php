<?php
require_once '../../src/Repository/correlativolocalRepository.php';
require_once '../../src/Controller/correlativolocalController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxCorrelativoLocal
{
    public function listCorrelativoLocal()
    {
        $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
        $response = CorrelativoLocalController::mostrarCorrelativoLocal($param);
        for ($i=0; $i < count($response); $i++) { 
            $encript = Openssl::encriptar($response[$i]['idcorrelative'], $_ENV['SECRET_KEY']);
            if ($response[$i]['enabled'] == 1) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';                
                $response[$i]['acciones'] = '
                <div class="text-center">                    
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarCorrelativo(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                </div>';
            } else if ($response[$i]['enabled'] == 0) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                $response[$i]['acciones'] = '
                <div class="text-center">
                    <button type="button" class="btn btn-outline-success" onclick="reingresarCorrelativo(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                </div>';
            }
        }
        echo json_encode($response);
    }
}
$resp = new listAjaxCorrelativoLocal;
$resp->listCorrelativoLocal();
?>