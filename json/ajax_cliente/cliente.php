<?php
require_once '../../src/Repository/clienteRepository.php';
require_once '../../src/Controller/clienteController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class ClienteAjax
{
    public function ajaxCrudCliente()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if ($_POST['selectTipoDocumento'] != null || $_POST['textNDocumento'] != null) {
                $codigo = 'CL' . substr(uniqid(), 5);

                $tipoDocument = ClienteController::buscarDocumento($_POST['selectTipoDocumento']);

                if ($tipoDocument['data']['description'] == 'RUC') {
                    if (strlen($_POST['textNDocumento']) != 11) {
                        $response = array('responseJson' => 'no ruc');
                    } else {
                        if ($_POST['textNombre'] == null && $_POST['textApellido'] == null && $_POST['textRazonSocial'] == null && $_POST['textNombreComercial'] == null) {
                            $response = array('responseJson' => 'no cliente');
                        } else {
                            $modelCliente = new ClienteModel(null, $codigo, $_POST['textNDocumento'], $_POST['textNombre'], $_POST['textApellido'], $_POST['textRazonSocial'], $_POST['textNombreComercial'], $_POST['textDireccion'], $_POST['textDireccionFiscal'], $_POST['textCorreo'], $_POST['textContacto'], $_POST['selectTipoDocumento']);
                            $respCliente = ClienteController::guardarCliente($modelCliente);
                            if (!isset($respCliente)) {
                                $response = array('responseJson' => 'no server');
                            } else {
                                if (isset($respCliente['message'])) {

                                    $response =  $respCliente;
                                } else {
                                    $response =  $respCliente;
                                }
                            }
                        }
                    }
                } else if ($tipoDocument['data']['description'] == 'DNI') {
                    if (strlen($_POST['textNDocumento']) != 8) {
                        $response = array('responseJson' => 'no dni');
                    } else {
                        if ($_POST['textNombre'] == null && $_POST['textApellido'] == null && $_POST['textRazonSocial'] == null && $_POST['textNombreComercial'] == null) {
                            $response = array('responseJson' => 'no cliente');
                        } else {
                            $modelCliente = new ClienteModel(null, $codigo, $_POST['textNDocumento'], $_POST['textNombre'], $_POST['textApellido'], $_POST['textRazonSocial'], $_POST['textNombreComercial'], $_POST['textDireccion'], $_POST['textDireccionFiscal'], $_POST['textCorreo'], $_POST['textContacto'], $_POST['selectTipoDocumento']);
                            $respCliente = ClienteController::guardarCliente($modelCliente);
                            if (!isset($respCliente)) {
                                $response = array('responseJson' => 'no server');
                            } else {
                                if (isset($respCliente['message'])) {

                                    $response =  $respCliente;
                                } else {
                                    $response =  $respCliente;
                                }
                            }
                        }
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['selectTipoDocumento'] != null || $_POST['textNDocumento'] != null) {
                $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);

                $tipoDocument = ClienteController::buscarDocumento($_POST['selectTipoDocumento']);

                if ($tipoDocument['data']['description'] == 'RUC') {
                    if (strlen($_POST['textNDocumento']) != 11) {
                        $response = array('responseJson' => 'no ruc');
                    } else {
                        if ($_POST['textNombre'] == null && $_POST['textApellido'] == null && $_POST['textRazonSocial'] == null && $_POST['textNombreComercial'] == null) {
                            $response = array('responseJson' => 'no cliente');
                        } else {
                            $modelCliente = new ClienteModel($param, null, $_POST['textNDocumento'], $_POST['textNombre'], $_POST['textApellido'], $_POST['textRazonSocial'], $_POST['textNombreComercial'], $_POST['textDireccion'], $_POST['textDireccionFiscal'], $_POST['textCorreo'], $_POST['textContacto'], $_POST['selectTipoDocumento']);
                            $respCliente = ClienteController::actualizarCliente($modelCliente);
                            if (!isset($respCliente)) {
                                $response = array('responseJson' => "no server");
                            } else {
                                if (isset($respCliente['message'])) {
                                    $response =  $respCliente;
                                } else {
                                    $response =  $respCliente;
                                }
                            }
                        }
                    }
                } else if ($tipoDocument['data']['description'] == 'DNI') {
                    if (strlen($_POST['textNDocumento']) != 8) {
                        $response = array('responseJson' => 'no dni');
                    } else {
                        if ($_POST['textNombre'] == null && $_POST['textApellido'] == null && $_POST['textRazonSocial'] == null && $_POST['textNombreComercial'] == null) {
                            $response = array('responseJson' => 'no cliente');
                        } else {
                            $modelCliente = new ClienteModel($param, null, $_POST['textNDocumento'], $_POST['textNombre'], $_POST['textApellido'], $_POST['textRazonSocial'], $_POST['textNombreComercial'], $_POST['textDireccion'], $_POST['textDireccionFiscal'], $_POST['textCorreo'], $_POST['textContacto'], $_POST['selectTipoDocumento']);
                            $respCliente = ClienteController::actualizarCliente($modelCliente);
                            if (!isset($respCliente)) {
                                $response = array('responseJson' => "no server");
                            } else {
                                if (isset($respCliente['message'])) {
                                    $response =  $respCliente;
                                } else {
                                    $response =  $respCliente;
                                }
                            }
                        }
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCliente = ClienteController::mostrarIdCliente($param);
            if (!isset($respCliente)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respCliente['status']) {
                    $response = array(
                        "status"            => true,
                        "id"                => Openssl::encriptar($respCliente['data']['id'], $_ENV['SECRET_KEY']),
                        "number_document"   => $respCliente['data']['number_document'],
                        "names"             => $respCliente['data']['names'],
                        "lastnames"         => $respCliente['data']['lastnames'],
                        "bussinesnames"     => $respCliente['data']['bussinesnames'],
                        "tradename"         => $respCliente['data']['tradename'],
                        "address"           => $respCliente['data']['address'],
                        "address_fiscal"    => $respCliente['data']['address_fiscal'],
                        "email"             => $respCliente['data']['email'],
                        "cell_phone"        => $respCliente['data']['cell_phone'],
                        "typedocumentId"    => $respCliente['data']['typedocument']['id']
                    );
                } else {
                    $response = $respCliente;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getIdInfo") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCliente = ClienteController::mostrarIdCliente($param);
            if (!isset($respCliente)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respCliente['status']) {
                    if ($respCliente['data']['lastnames'] == null && $respCliente['data']['names'] == null || $respCliente['data']['lastnames'] == "" && $respCliente['data']['names'] == "") {
                        $personal = $respCliente['data']['bussinesnames'];
                    } else {
                        $personal = $respCliente['data']['lastnames'] . ", " . $respCliente['data']['names'];
                    }


                    $response = array(
                        "status"            => true,
                        "id"                => Openssl::encriptar($respCliente['data']['id'], $_ENV['SECRET_KEY']),
                        "number_document"   => $respCliente['data']['number_document'],
                        "personal"          => $personal,
                        "tradename"         => $respCliente['data']['tradename'],
                        "address"           => $respCliente['data']['address'],
                        "address_fiscal"    => $respCliente['data']['address_fiscal'],
                        "email"             => $respCliente['data']['email'],
                        "cell_phone"        => $respCliente['data']['cell_phone'],
                        "typedocument"      => $respCliente['data']['typedocument']['description']
                    );
                } else {
                    $response = $respCliente;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCliente = ClienteController::eliminarCliente($param, $_POST['enabled']);
            if (!isset($respCliente)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCliente['message'])) {
                    $response =  $respCliente;
                } else {
                    $response =  $respCliente;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getCliente') {
            $response = ClienteController::mostrarClientesActivos();
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'changeClient') {
            if($_POST['param']=="" || $_POST['param']==null){
                $response= array('responseJson' => "vacio");
            }else{
                $respCliente = ClienteController::mostrarIdCliente($_POST['param']);
            if (!isset($respCliente)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respCliente['status']) {
                    $response = array(
                        "status"            => true,
                        "id"                => Openssl::encriptar($respCliente['data']['id'], $_ENV['SECRET_KEY']),
                        "number_document"   => $respCliente['data']['number_document'],
                        "names"             => $respCliente['data']['names'],
                        "lastnames"         => $respCliente['data']['lastnames'],
                        "bussinesnames"     => $respCliente['data']['bussinesnames'],
                        "tradename"         => $respCliente['data']['tradename'],
                        "address"           => $respCliente['data']['address'],
                        "address_fiscal"    => $respCliente['data']['address_fiscal'],
                        "email"             => $respCliente['data']['email'],
                        "cell_phone"        => $respCliente['data']['cell_phone'],
                        "typedocumentId"    => $respCliente['data']['typedocument']['id']
                    );
                } else {
                    $response = $respCliente;
                }
            }
            }            
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new ClienteAjax;
$resp->ajaxCrudCliente();
?>