<?php
require_once '../../src/Controller/tipoManufacturaController.php';
require_once '../../src/Repository/tipoManufacturaRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxTipoManufactura
{
    public function listTipoManufactura()
    {
        $response = TipoManufacturaController::mostrarTipoManufactura();

        for ($i=0; $i < count($response); $i++) { 
            $encript = Openssl::encriptar($response[$i]['id'],$_ENV['SECRET_KEY']);
            if ($response[$i]['enabled'] == 1) {
                $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                $response[$i]['acciones'] = '
                <div class="text-center">
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarTipoManufactura(' ."'". $encript . "'".')"><i class="fas fa-trash"></i></button>
                </div>';
            } else {
                if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                      <button type="button" class="btn btn-outline-success" onclick="reingresarTipoManufactura(' ."'". $encript . "'".')"><i class="fas fa-door-open"></i></button>
                    </div>';          
                }
            }
        }

        echo json_encode($response);
    }
}
$resp = new listAjaxTipoManufactura;
$resp->listTipoManufactura();
?>