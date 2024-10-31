<?php
require_once '../../src/Controller/reposicionController.php';
require_once '../../src/Repository/reposicionRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class listAjaxReposicion
{
    public function listReposicion()
    {
        if (isset($_POST['listar']) && $_POST['listar'] == 'listStock') {
            $response = ReposicionController::mostrarReposicion($_POST['manufactura'], $_POST['sede']);

            for ($i = 0; $i < count($response); $i++) {
                $encriptReposicion = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
                $encriptStorehouse = Openssl::encriptar($response[$i]['idstorehouse'], $_ENV['SECRET_KEY']);

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarReposicionStock(' . "'" . $encriptReposicion . "'" . ')"><i class="far fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarReposicionStock(' . "'" . $encriptReposicion . "','" . $encriptStorehouse . "'" . ')"><i class="fas fa-shield-alt"></i></button>
                    </div>';
                } else {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Anulado</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarReposicionStock(' . "'" . $encriptReposicion . "'" . ')"><i class="far fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-times"></i></button>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'listDigital') {
            $response = ReposicionController::mostrarReposicion($_POST['manufactura'], $_POST['sede']);

            for ($i = 0; $i < count($response); $i++) {
                $encriptReposicion = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
                $encriptStorehouse = Openssl::encriptar($response[$i]['idstorehouse'], $_ENV['SECRET_KEY']);

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarReposicion(' . "'" . $encriptReposicion . "'" . ')"><i class="far fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarReposicion(' . "'" . $encriptReposicion . "','" . $encriptStorehouse . "'" . ')"><i class="fas fa-shield-alt"></i></button>
                    </div>';
                } else {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Anulado</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarReposicionStock(' . "'" . $encriptReposicion . "'" . ')"><i class="far fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-times"></i></button>
                    </div>';
                }
            }
        } else if (isset($_POST['listar']) && $_POST['listar'] == 'listConvencional') {
            $response = ReposicionController::mostrarReposicion($_POST['manufactura'], $_POST['sede']);

            for ($i = 0; $i < count($response); $i++) {
                $encriptReposicion = Openssl::encriptar($response[$i]['id'], $_ENV['SECRET_KEY']);
                $encriptStorehouse = Openssl::encriptar($response[$i]['idstorehouse'], $_ENV['SECRET_KEY']);

                if ($response[$i]['enabled'] == 1) {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-success badge-shadow p-2">Activo</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarReposicion(' . "'" . $encriptReposicion . "'" . ')"><i class="far fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="eliminarReposicion(' . "'" . $encriptReposicion . "','" . $encriptStorehouse . "'" . ')"><i class="fas fa-shield-alt"></i></button>
                    </div>';
                } else {
                    $response[$i]['enabled'] = '<div class="text-center"><span class="badge badge-secondary badge-shadow p-2">Anulado</span></div>';
                    $response[$i]['acciones'] = '
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#info-modal" onclick="visualizarReposicionStock(' . "'" . $encriptReposicion . "'" . ')"><i class="far fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-times"></i></button>
                    </div>';
                }
            }
        }

        echo json_encode($response);
    }
}

$resp = new listAjaxReposicion;
$resp->listReposicion();
