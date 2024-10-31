<?php
require_once '../../src/Controller/tipoController.php';
require_once '../../src/Repository/tipoRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxTipo
{
    public function listTipo()
    {
        $response = TipoController::mostrarTipo();

        for ($i=0; $i < count($response); $i++) {
            $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
            $response[$i]['typemanufacturing'] = $response[$i]['typemanufacturing']['description'];
            if ($response[$i]['enabled'] == 1) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                $response[$i]['acciones'] = '
                <div class="text-center">            
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar_tipo-modal" onclick="actualizarTipo(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarTipo(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                </div>';
            } else {
                if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                      <button type="button" class="btn btn-outline-success" onclick="reingresarTipo(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        }
        echo json_encode($response);
    }
}
$resp =  new listAjaxTipo;
$resp->listTipo();