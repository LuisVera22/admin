<?php
require_once '../../src/Controller/proveedorController.php';
require_once '../../src/Repository/proveedorRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class ProveedorAjax
{
    public function ajaxCrudProveedor()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textNDocumento'] != null  || $_POST['textRazonSocial'] != null) {
                $modelProveedor = new ProveedorModel(null, $_POST['textNDocumento'], $_POST['textRazonSocial'], $_POST['textDireccion'], $_POST['textCorreo'], $_POST['textNumeroCelular'], $_POST['textContacto']);
                $respProveedor = ProveedorController::guardarProveedor($modelProveedor);
                if (!isset($respProveedor)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respProveedor['message'])) {
                        $response = $respProveedor;
                    } else {
                        $response = $respProveedor;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['textNDocumento'] != null  ||  $_POST['textRazonSocial'] != null || $_POST['param'] != null) {
                $desencriptar = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelProveedor = new ProveedorModel($desencriptar, $_POST['textNDocumento'], $_POST['textRazonSocial'], $_POST['textDireccion'], $_POST['textCorreo'], $_POST['textNumeroCelular'], $_POST['textContacto']);
                $respProveedor = ProveedorController::actualizarProveedor($modelProveedor);
                if (!isset($respProveedor)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respProveedor['message'])) {
                        $response = $respProveedor;
                    } else {
                        $response = $respProveedor;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listId') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respProveedor = ProveedorController::mostrarIdProveedor($param);
            if (!isset($respProveedor)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respProveedor['status']) {
                    $response = array(
                        "status"           => true,
                        "id"               => Openssl::encriptar($respProveedor['data']['id'], $_ENV['SECRET_KEY']),
                        "number_document"  => $respProveedor['data']['number_document'],
                        "bussinesname"     => $respProveedor['data']['bussinesname'],
                        "address"          => $respProveedor['data']['address'],
                        "cell_phone"       => $respProveedor['data']['cell_phone'],
                        "email"            => $respProveedor['data']['email'],
                        "contact"          => $respProveedor['data']['contact'],
                    );
                } else {
                    $response = $respProveedor;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getIdInfo') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respProveedor = ProveedorController::mostrarIdProveedor($param);
            if (!isset($respProveedor)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respProveedor['status']) {
                    $response  = array(
                        "status"           => true,
                        "id"               => Openssl::encriptar($respProveedor['data']['id'], $_ENV['SECRET_KEY']),
                        "number_document"  => $respProveedor['data']['number_document'],
                        "bussinesname"     => $respProveedor['data']['bussinesname'],
                        "address"          => $respProveedor['data']['address'],
                        "cell_phone"       => $respProveedor['data']['cell_phone'],
                        "email"            => $respProveedor['data']['email'],
                        "contact"          => $respProveedor['data']['contact'],
                    );
                } else {
                    $response = $respProveedor;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respProveedor = ProveedorController::eliminarProveedor($param, $_POST['enabled']);
            if (!isset($respProveedor)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respProveedor['message'])) {
                    $response = $respProveedor;
                } else {
                    $response = $respProveedor;
                }
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new ProveedorAjax;
$resp->ajaxCrudProveedor();
