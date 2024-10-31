<?php
require_once '../../src/Controller/reposicionController.php';
require_once '../../src/Repository/reposicionRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class ReposicionAjax
{
    public function ajaxCrudReposicion()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == 'createStck') {
            if ($_POST['selectCodigoProducto'] != null && $_POST['textCodigoOrden'] != null && $_POST['textCantidad'] != null && $_POST['textMotivo'] != null) {
                $modelReposicion = new ReposicionModel(null, $_POST['selectCodigoProducto'], $_POST['textCodigoOrden'], $_POST['textCantidad'], date('Y-m-d'), date('Y-m-d H:i:s'), $_POST['textMotivo'], '3');
                $respReposicion = ReposicionController::guardarReposicion($modelReposicion);
                if (!isset($respReposicion)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respReposicion['message'])) {
                        $response =  $respReposicion;
                    } else {
                        $response =  $respReposicion;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if(isset($_POST['crud']) && $_POST['crud']=='createDig'){
            if ($_POST['selectCodigoProductoDig'] != null && $_POST['textCodigoOrden'] != null && $_POST['textCantidad'] != null && $_POST['textMotivo'] != null) {
                $modelReposicion = new ReposicionModel(null, $_POST['selectCodigoProductoDig'], $_POST['textCodigoOrden'], $_POST['textCantidad'], date('Y-m-d'), date('Y-m-d H:i:s'), $_POST['textMotivo'], '3');
                $respReposicion = ReposicionController::guardarReposicion($modelReposicion);
                if (!isset($respReposicion)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respReposicion['message'])) {
                        $response =  $respReposicion;
                    } else {
                        $response =  $respReposicion;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }            
        }else if(isset($_POST['crud']) && $_POST['crud']=='createConv'){
            if ($_POST['selectCodigoProductoConv'] != null && $_POST['textCodigoOrden'] != null && $_POST['textCantidad'] != null && $_POST['textMotivo'] != null) {
                $modelReposicion = new ReposicionModel(null, $_POST['selectCodigoProductoConv'], $_POST['textCodigoOrden'], $_POST['textCantidad'], date('Y-m-d'), date('Y-m-d H:i:s'), $_POST['textMotivo'], '3');
                $respReposicion = ReposicionController::guardarReposicion($modelReposicion);
                if (!isset($respReposicion)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respReposicion['message'])) {
                        $response =  $respReposicion;
                    } else {
                        $response =  $respReposicion;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }            
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'delete') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $param2 = Openssl::desencriptar($_POST['param2'], $_ENV['SECRET_KEY']);
            $respReposicion = ReposicionController::eliminarReposicion($param, $param2, $_POST['param3'], $_POST['enabled']);
            if (!isset($respReposicion)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respReposicion['message'])) {
                    $response =  $respReposicion;
                } else {
                    $response =  $respReposicion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getIdInfo') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respReposicion = ReposicionController::mostrarIdReposicion($param);
            if (!isset($respReposicion)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respReposicion['status']) {
                    $response =  array(
                        "status"            => true,
                        "description"       => $respReposicion['data']['description'],
                        "datetime"          => $respReposicion['data']['datetime'],
                        "replacementmount"  => $respReposicion['data']['replacementmount'],
                        "codigo"            => $respReposicion['data']['quotation']['codigo'],
                        "client"            => $respReposicion['data']['quotation']['client'],
                        "address"           => $respReposicion['data']['quotation']['store']['address'],
                        "typemanufacturing" => $respReposicion['data']['quotation']['typemanufacturing']['description'],
                        "descripciontotal"  => $respReposicion['data']['quotation']['descripciontotal'],
                        "vendor"            => $respReposicion['data']['quotation']['vendor']['lastname'].', '.$respReposicion['data']['quotation']['vendor']['name'],
                        "codigoProduct"     => $respReposicion['data']['storehousexstore']['storehouse']['codigo'],
                        "product"           => $respReposicion['data']['storehousexstore']['storehouse']['product']

                    );
                } else {
                    $response =  $respReposicion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getReposicionxManufact'){
            $response = ReposicionController::listarReposicionxManufactura($_POST['tipo']);
        }else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$resp = new ReposicionAjax;
$resp->ajaxCrudReposicion();
