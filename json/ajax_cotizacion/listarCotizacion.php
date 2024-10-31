<?php
require_once '../../src/Controller/cotizacionController.php';
require_once '../../src/Repository/cotizacionRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxCotizacion
{
    public function listCotizacion()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == 'listFecha') {
            if ($_POST['desde'] != null) {
                $fecha = DateTime::createFromFormat('d/m/Y', $_POST['desde']);
                $desde = $fecha->format('Y-m-d');
            } else {
                $desde = '';
            }
            if ($_POST['hasta'] != null) {
                $fecha = DateTime::createFromFormat('d/m/Y', $_POST['hasta']);
                $hasta = $fecha->format('Y-m-d');
            } else {
                $hasta = '';
            }

            $response = CotizacionController::listarCotizacionFecha($desde, $hasta, $_POST['local']);

            for ($i = 0; $i < count($response); $i++) {
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
                if ($response[$i]['document'] != '' || $response[$i]['document'] != null) {
                    $response[$i]['checkbox'] = '
                    <div class="text-center">
                        <input type="checkbox" name="" id="" value="' . $encript . '" disabled/>
                    </div>';
                } else {
                    $response[$i]['checkbox'] = '
                    <div class="text-center">
                        <input type="checkbox" name="" id="" value="' . $encript . '"/>
                    </div>';
                }
                $response[$i]['ticket'] = '
                <div class="text-center">
                    <button type="button" class="btn btn-outline-dark btn-sm px-3" data-bs-toggle="modal" data-bs-target="#print-modal"><i class="fas fa-print"></i></button>
                </div>';
                $response[$i]['date_issue'] = date("d-m-Y", strtotime($response[$i]['date_issue']));
                $nombreVendedor = $response[$i]['vendor']['lastname'] . ', ' . $response[$i]['vendor']['name'];
                $response[$i]['vendedor'] = $nombreVendedor;
                if ($response[$i]['courier'] != null) {
                    $nombreMensajero = $response[$i]['courier']['lastname'] . ', ' . $response[$i]['courier']['name'];
                    $response[$i]['mensajero'] = $nombreMensajero;
                } else {
                    $response[$i]['mensajero'] = $response[$i]['store']['headquarters']['description'];
                }
                $response[$i]['sede'] = $response[$i]['store']['headquarters']['description'];

                if ($response[$i]['status_mialmacen'] == 0) {
                    $response[$i]['status_mialmacen'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Sin Enviar</span></div>';
                } else {
                    $response[$i]['status_mialmacen'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Enviado</span></div>';
                }

                if ($response[$i]['status_rbcalmacen'] == 0) {
                    $response[$i]['status_rbcalmacen'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Sin Enviar</span></div>';
                } else {
                    $response[$i]['status_rbcalmacen'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Enviado</span></div>';
                }

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                    
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar-modal" onclick="actualizarCotizacion(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarCotizacion(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Anulado</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-success" onclick="reingresarCotizacion(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        } else {
            $response = CotizacionController::listarCotizacion($_POST['local']);

            for ($i = 0; $i < count($response); $i++) {
                $encript = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
                if ($response[$i]['document'] != '' || $response[$i]['document'] != null) {
                    $response[$i]['checkbox'] = '
                    <div class="text-center">
                        <input type="checkbox" name="" id="" value="' . $encript . '" disabled/>
                    </div>';
                } else {
                    $response[$i]['checkbox'] = '
                    <div class="text-center">
                        <input type="checkbox" name="" id="" value="' . $encript . '"/>
                    </div>';
                }
                $response[$i]['ticket'] = '
                <div class="text-center">
                    <button type="button" class="btn btn-outline-dark btn-sm px-3" data-bs-toggle="modal" data-bs-target="#print-modal"><i class="fas fa-print"></i></button>
                </div>';
                $response[$i]['date_issue'] = date("d-m-Y", strtotime($response[$i]['date_issue']));
                $nombreVendedor = $response[$i]['vendor']['lastname'] . ', ' . $response[$i]['vendor']['name'];
                $response[$i]['vendedor'] = $nombreVendedor;
                if ($response[$i]['courier'] != null) {
                    $nombreMensajero = $response[$i]['courier']['lastname'] . ', ' . $response[$i]['courier']['name'];
                    $response[$i]['mensajero'] = $nombreMensajero;
                } else {
                    $response[$i]['mensajero'] = $response[$i]['store']['headquarters']['description'];
                }
                if ($response[$i]['status_mialmacen'] == 0) {
                    $response[$i]['status_mialmacen'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Sin Enviar</span></div>';
                } else {
                    $response[$i]['status_mialmacen'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Enviado</span></div>';
                }

                if ($response[$i]['status_rbcalmacen'] == 0) {
                    $response[$i]['status_rbcalmacen'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Sin Enviar</span></div>';
                } else {
                    $response[$i]['status_rbcalmacen'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Enviado</span></div>';
                }

                $response[$i]['sede'] = $response[$i]['store']['headquarters']['description'];
                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">                    
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#actualizar-modal" onclick="actualizarCotizacion(' . "'" . $encript . "'" . ')"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarCotizacion(' . "'" . $encript . "'" . ')"><i class="fas fa-trash"></i></button>
                    </div>';
                } else {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-danger badge-shadow p-2">Anulado</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-success" onclick="reingresarCotizacion(' . "'" . $encript . "'" . ')"><i class="fas fa-door-open"></i></button>
                    </div>';
                }
            }
        }


        echo json_encode($response);
    }
}
$resp = new listAjaxCotizacion;
$resp->listCotizacion();
