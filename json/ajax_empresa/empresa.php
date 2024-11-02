<?php
require_once '../../src/Controller/empresaController.php';
require_once '../../src/Repository/empresaRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class EmpresaAjax
{
    public function ajaxCrudEmpresa()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "getEmpresa") {
            $respEmpresa = EmpresaController::mostrarEmpresa();
            if (!isset($respEmpresa)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respEmpresa['message'])) {
                    $response =  $respEmpresa;
                } else {
                    if (!empty($respEmpresa)) {
                        $response = array(
                            "id"                    => Openssl::encriptar($respEmpresa[0]['id'], $_ENV['SECRET_KEY']),
                            "razon_social"          => $respEmpresa[0]['razon_social'],
                            "ruc"                   => $respEmpresa[0]['ruc'],
                            "address"               => $respEmpresa[0]['address'],
                            "fiscal_address"        => $respEmpresa[0]['fiscal_address'],
                            "email"                 => $respEmpresa[0]['email'],
                            "img_logo_empresa_name" => $respEmpresa[0]['img_logo_empresa_name'],
                            "img_logo_empresa_url"  => $respEmpresa[0]['img_logo_empresa_url']
                        );
                    } else {
                        $response = array();
                    }
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['textruc'] != null && $_POST['textrazonsocial'] != null && $_POST['textdireccion'] != null) {
                $modelEmpresa   = new EmpresaModel(null, $_POST['textrazonsocial'], $_POST['textruc'], $_POST['textdireccion'], $_POST['textdireccionfiscal'], $_POST['textcorreo']);
                $respEmpresa    = EmpresaController::guardarEmpresa($modelEmpresa);
                if (!isset($respEmpresa)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respEmpresa['message'])) {
                        $response =  $respEmpresa;
                    } else {
                        $response =  $respEmpresa;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param'] != null && $_POST['textruc'] != null && $_POST['textrazonsocial'] != null && $_POST['textdireccion'] != null) {
                $desencriptar   = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelEmpresa   = new EmpresaModel($desencriptar, $_POST['textrazonsocial'], $_POST['textruc'], $_POST['textdireccion'], $_POST['textdireccionfiscal'], $_POST['textcorreo']);
                $respEmpresa       = EmpresaController::actualizarEmpresa($modelEmpresa);
                if (!isset($respEmpresa)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respEmpresa['message'])) {
                        $response =  $respEmpresa;
                    } else {
                        $response =  $respEmpresa;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "updateImg") {
            $file = $_FILES['imgBusiness'];
            $mimetype = $file['type'];
            if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
                $desencriptar = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $response = EmpresaController::actualizarImagen($desencriptar, $file);
            } else {
                $response = array('responseJson' => 'no imagen');
            }       
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new EmpresaAjax;
$resp->ajaxCrudEmpresa();