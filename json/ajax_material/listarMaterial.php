<?php
require_once '../../src/Controller/materialController.php';
require_once '../../src/Repository/materialRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxMaterial
{
    public function listMaterial()
    {
        $response = MaterialController::mostrarMateriales();

        for ($i = 0; $i < count($response); $i++) {
            $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
            if ($response[$i]['subtype'] == null || $response[$i]['subtype'] == "") {
                $response[$i]['tipo_subtipo'] = $response[$i]['type']['typemanufacturing']['description'].'-'.$response[$i]['type']['description'];
            } else {
                $response[$i]['tipo_subtipo'] = $response[$i]['subtype']['type']['typemanufacturing']['description'] . "-" . $response[$i]['subtype']['type']['description'] .' '. $response[$i]['subtype']['description'];
            }
            if ($response[$i]['enabled'] == 1) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                $response[$i]['acciones'] = '
                <div class="text-center">            
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar_material-modal" onclick="actualizarMaterial(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarMaterial(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                </div>';
            } else {
                if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                      <button type="button" class="btn btn-outline-success" onclick="reingresarMaterial(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        }

        echo json_encode($response);
    }
}
$resp = new listAjaxMaterial;
$resp->listMaterial();
