<?php
require_once '../../src/Controller/claseController.php';
require_once '../../src/Repository/claseRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class ListAjaxClase
{
    public function listClase()
    {
        $response = ClaseController::mostrarClases();

        for ($i = 0; $i < count($response); $i++) {
            $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
            if ($response[$i]['materials']['subtype'] == null || $response[$i]['materials']['subtype'] == "") {
                $response[$i]['materiales'] = $response[$i]['materials']['type']['typemanufacturing']['description'] . ' || ' . $response[$i]['materials']['description'] . ' ' . $response[$i]['materials']['type']['description'];
            } else {
                $response[$i]['materiales'] = $response[$i]['materials']['type']['typemanufacturing']['description'] . ' || ' . $response[$i]['materials']['description'] . ' ' . $response[$i]['materials']['type']['description'] . ' ' . $response[$i]['materials']['subtype']['description'];
            }
            if ($response[$i]['enabled'] == 1) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                $response[$i]['acciones'] = '
                <div class="text-center">            
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar_clase-modal" onclick="actualizarClases(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarClases(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                </div>';
            } else {
                if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                      <button type="button" class="btn btn-outline-success" onclick="reingresarClases(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        }

        echo json_encode($response);
    }
}
$resp = new ListAjaxClase;
$resp->listClase();
