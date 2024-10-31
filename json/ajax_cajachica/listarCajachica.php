<?php
require_once '../../src/Repository/cajachicaRepository.php';
require_once '../../src/Controller/cajachicaController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxCajachica
{
    public function listCajachica()
    {
        /*Llamar al método para obtener los registros de Cajachica*/
        $response = CajachicaController::mostrarCajachica();

        /*Verificar si se obtuvieron registros correctamente*/
        if ($response && is_array($response)) {
            for ($i = 0; $i < count($response); $i++) {
                
                /* Encriptar el id de cada registro*/
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);

                /*Preparar el array para mostrar los campos*/
                $response[$i] = [
                    'id' => $encript,
                    'date' => $response[$i]['date'],
                    'time' => $response[$i]['time'],
                    'description' => $response[$i]['description'],
                    'amount' => $response[$i]['amount'],
                    'username' => $response[$i]['username'],
                    'acciones' => '
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarCajachica(' . "'" . $encript . "'" . ')"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar-modal" onclick="actualizarCajachica(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-outline-danger" onclick="eliminarCajachica(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                        </div>'
                ];
            }
            /*Envíar la respuesta como JSON*/
            echo json_encode($response);
        } else {
            echo json_encode(['responseJson' => 'No se encontraron registros de caja chica.']);
        }
    }
}

$resp = new listAjaxCajachica;
$resp->listCajachica();