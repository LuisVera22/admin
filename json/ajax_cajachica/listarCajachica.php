<?php
require_once '../../src/Repository/cajachicaRepository.php';
require_once '../../src/Controller/cajachicaController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxCajachica
{
    public function listCajachica()
    {
        $response = CajachicaController::mostrarCajachica();

        for ($i = 0; $i < count($response); $i++) {
                
            $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);

            $response[$i]['acciones'] = 
                '<div class="text-center">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarCajachica(' . "'" . $encript . "'" . ')"><i class="fa fa-eye"></i></button>
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar-modal" onclick="actualizarCajachica(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarCajachica(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                </div>';
        }
        echo json_encode($response);
    }
}

$resp = new listAjaxCajachica;
$resp->listCajachica();