<?php
require_once '../../src/Controller/almacenController.php';
require_once '../../src/Repository/almacenRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxAlmacen
{
    public function listAlmacen()
    {

        if (isset($_POST['listar']) && $_POST['listar'] == 'toProductStockStorehouse') {
            $response = AlmacenController::listarProductoAlmacenxManufactura($_POST['manufactura'], $_POST['sede']);
            for ($i = 0; $i < count($response); $i++) {
                $encriptStore = Openssl::encriptar($response[$i]['idstore'], $_ENV['SECRET_KEY']);
                $encriptStoreHouse = Openssl::encriptar($response[$i]['idstorehouse'], $_ENV['SECRET_KEY']);
                $response[$i]['idstore'] = $encriptStore;
                $response[$i]['idstorehouse'] = $encriptStoreHouse;

                if ($response[$i]['quantity'] == 0) {
                    $response[$i]['almacen'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">VACIO</span></div>';
                } else if ($response[$i]['quantity'] > 30) {
                    $response[$i]['almacen'] = '<div class="text-center"><span class="badge badge-info badge-shadow p-2">LLENO</span></div>';
                } else if ($response[$i]['quantity'] > 0  && $response[$i]['quantity'] <= 30) {
                    $response[$i]['almacen'] = '<div class="text-center"><span class="badge badge-warning badge-shadow p-2">MODERADO</span></div>';
                }

                $response[$i]['quantity'] = '<div class="text-center">' . $response[$i]['quantity'] . '</div>';

                if ($response[$i]['storehouse']['enabled'] == 1) {
                    $response[$i]['storehouse']['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarAlmacenStock(' . "'" . $encriptStoreHouse . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else if ($response[$i]['storehouse']['enabled'] == 0) {
                    $response[$i]['storehouse']['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                        <button type="button" class="btn btn-outline-success" onclick="reingresarAlmacenStock(' . "'" . $encriptStoreHouse . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'toProductFabStorehouse') {

            $response = AlmacenController::listarProductoAlmacenxManufactura($_POST['manufactura'], $_POST['sede']);

            for ($i = 0; $i < count($response); $i++) {

                $encriptStore = Openssl::encriptar($response[$i]['idstore'], $_ENV['SECRET_KEY']);
                $encriptStoreHouse = Openssl::encriptar($response[$i]['idstorehouse'], $_ENV['SECRET_KEY']);
                $response[$i]['idstore'] = $encriptStore;
                $response[$i]['idstorehouse'] = $encriptStoreHouse;

                if ($response[$i]['quantity'] == 0) {
                    $response[$i]['almacen'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">VACIO</span></div>';
                } else if ($response[$i]['quantity'] > 30) {
                    $response[$i]['almacen'] = '<div class="text-center"><span class="badge badge-info badge-shadow p-2">LLENO</span></div>';
                } else if ($response[$i]['quantity'] > 0  && $response[$i]['quantity'] <= 30) {
                    $response[$i]['almacen'] = '<div class="text-center"><span class="badge badge-warning badge-shadow p-2">MODERADO</span></div>';
                }

                $response[$i]['quantity'] = '<div class="text-center">' . $response[$i]['quantity'] . '</div>';

                if ($response[$i]['storehouse']['enabled'] == 1) {
                    $response[$i]['storehouse']['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarAlmacenFabricacion(' . "'" . $encriptStoreHouse . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else if ($response[$i]['storehouse']['enabled'] == 0) {
                    $response[$i]['storehouse']['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                        <button type="button" class="btn btn-outline-success" onclick="reingresarAlmacenFabricacion(' . "'" . $encriptStoreHouse . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'toProductStock') {

            $response = AlmacenController::mostrarAlmacen($_POST['tipo']);

            for ($i = 0; $i < count($response); $i++) {
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);

                $response[$i]['manufactura'] = $response[$i]['products']['typemanufacturing']['description'];

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarAlmacenProducto(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                        <button type="button" class="btn btn-outline-success" onclick="reingresarAlmacenProducto(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'toProductDigital') {

            $response = AlmacenController::mostrarAlmacen($_POST['tipo']);

            for ($i = 0; $i < count($response); $i++) {
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);

                $response[$i]['manufactura'] = $response[$i]['products']['typemanufacturing']['description'];

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarAlmacenProducto(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                        <button type="button" class="btn btn-outline-success" onclick="reingresarAlmacenProducto(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'toProductConvencional') {

            $response = AlmacenController::mostrarAlmacen($_POST['tipo']);

            for ($i = 0; $i < count($response); $i++) {
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);

                $response[$i]['manufactura'] = $response[$i]['products']['typemanufacturing']['description'];

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarAlmacenProducto(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else if ($response[$i]['enabled'] == 0) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Inactivo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                      
                        <button type="button" class="btn btn-outline-success" onclick="reingresarAlmacenProducto(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        }
        echo json_encode($response);
    }
}

$resp = new listAjaxAlmacen;
$resp->listAlmacen();
