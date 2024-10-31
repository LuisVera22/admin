<?php
require_once '../../src/Controller/subclaseController.php';
require_once '../../src/Repository/subclaseRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class ListAjaxSubClase
{
    public function listSubClase()
    {
        $response = SubClaseController::mostrarSubClases();

        for ($i = 0; $i < count($response); $i++) {
            $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
            if ($response[$i]['classes']['materials']['subtype'] == null || $response[$i]['classes']['materials']['subtype'] == "") {
                $response[$i]['clases'] = $response[$i]['classes']['materials']['type']['typemanufacturing']['description'] . ' || ' . $response[$i]['classes']['materials']['description'] . ' ' . $response[$i]['classes']['materials']['type']['description'] . ' ' . $response[$i]['classes']['description'];
            } else {
                $response[$i]['clases'] = $response[$i]['classes']['materials']['type']['typemanufacturing']['description'] . ' || ' . $response[$i]['classes']['materials']['description'] . ' ' . $response[$i]['classes']['materials']['type']['description'] . ' ' . $response[$i]['classes']['materials']['subtype']['description'] . ' ' . $response[$i]['classes']['description'];
            }
            if ($response[$i]['enabled'] == 1) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                $response[$i]['acciones'] = '
                <div class="text-center">            
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar_subclase-modal" onclick="actualizarSubClase(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarSubClase(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                </div>';
            } else {
                if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                      <button type="button" class="btn btn-outline-success" onclick="reingresarSubClase(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        }

        echo json_encode($response);
    }
}
$resp = new ListAjaxSubClase;
$resp->listSubClase();
