<?php
require_once '../../src/Repository/localRepository.php';
require_once '../../src/Controller/localController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class ListAjaxLocal
{
    public function listLocal()
    {
        $response = LocalController::mostrarLocal();

        for ($i = 0; $i < count($response); $i++) {
            $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
            if ($response[$i]['main']  == 1) {
                $response[$i]['direccion'] = '<div>'.$response[$i]['address'] .' <span class="badge text-bg-info p-0">(Sede Principal)</span></div>';
            }else{
                $response[$i]['direccion'] = $response[$i]['address'];
            }

            if ($response[$i]['enabled'] == 1) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                $response[$i]['series'] = '<div class="text-center">
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#info-series" onclick="visualizarSeries(' . "'" . $encript . "','" . $response[$i]['address'] . "','" . $response[$i]['headquarters']['description'] . "'" . ')"><i class="fas fa-file-signature"></i></button>
                </div>';
                $response[$i]['acciones'] = '
                <div class="text-center">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarLocales(' . "'" . $encript . "'" . ')"><i class="fa fa-eye"></i></button>
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar-modal" onclick="actualizarLocales(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarLocales(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                </div>';
            } else {
                if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['series'] = '<div class="text-center">
                        <button type="button" class="btn btn-outline-secondary" disabled><i class="fas fa-shield-alt"></i></button>
                    </div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                      <button type="button" class="btn btn-outline-success" onclick="reingresarLocales(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        }
        echo json_encode($response);
    }
}
$resp = new ListAjaxLocal;
$resp->listLocal();
