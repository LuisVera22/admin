<?php
require_once '../../src/Controller/productoController.php';
require_once '../../src/Repository/productoRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxProducto
{
    public function listProducto()
    {
        if (isset($_POST['listar']) && $_POST['listar'] == 'toService') {
            $response = ProductoController::mostrarProducto($_POST['product']);
            for ($i = 0; $i < count($response); $i++) {
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                        
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar_servicios-modal" onclick="actualizarServicio(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarServicio(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                        <button type="button" class="btn btn-outline-success" onclick="reingresarServicio(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'toProduct') {
            $response = ProductoController::mostrarProducto($_POST['product']);
            for ($i = 0; $i < count($response); $i++) {
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                        
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar_productos-modal" onclick="actualizarProducto(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-secondary" onclick="eliminarProducto(' . "'" . $encript . "'" . ')"><i class="fas fa-times"></i></button>
                    </div>';
                } else if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Anulado</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <div class="badge badge-danger badge-shadow p-3"><i class="fas fa-times"></i></div>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'toServiceItem') {
            $response = ProductoController::mostrarServiciosActivos($_POST['product']);
            for ($i = 0; $i < count($response); $i++) {
                $response[$i]['id'] = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
            }
        }
        echo json_encode($response);
    }
}

$resp = new listAjaxProducto;
$resp->listProducto();
