<?php
require_once '../../src/Controller/productoController.php';
require_once '../../src/Repository/productoRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';
class ProductoAjax
{
    public function ajaxCrudProducto()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "createToservice") {
            if ($_POST['textServicio'] != null || $_POST['textPrecio'] != null || $_POST['selectSede'] != null) {
                $modelProducto = new ProductoModel(null, $_POST['textServicio'], 'services', $_POST['textPrecio'], null, null, null, null, null, null, $_POST['selectSede']);
                $respProducto  = ProductoController::guardarProducto($modelProducto);
                if (!isset($respProducto)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respProducto['message'])) {
                        $response =  $respProducto;
                    } else {
                        $response =  $respProducto;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "updateToservice") {
            if ($_POST['textServicio'] != null || $_POST['textPrecio'] != null || $_POST['selectSede'] != null) {
                $desencriptar = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelProducto = new ProductoModel($desencriptar, $_POST['textServicio'], 'services', $_POST['textPrecio'], null, null, null, null, null, null, $_POST['selectSede'],);
                $respProducto  = ProductoController::actualizarProducto($modelProducto);
                if (!isset($respProducto)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respProducto['message'])) {
                        $response =  $respProducto;
                    } else {
                        $response =  $respProducto;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listIdToservice') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respProducto = ProductoController::mostrarIdProducto($param);
            if (!isset($respProducto)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respProducto['status']) {
                    $response   = array(
                        "status"            =>  true,
                        "id"                =>  Openssl::encriptar($respProducto['data']['id'], $_ENV['SECRET_KEY']),
                        "description"       =>  $respProducto['data']['description'],
                        "price"             =>  $respProducto['data']['price'],
                        "storeId"           =>  $respProducto['data']['productsxstore']['store']['id'],
                    );
                } else {
                    $response =  $respProducto;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "deleteToservice") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respProducto = ProductoController::eliminarProducto($param, $_POST['enabled']);
            if (!isset($respProducto)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respProducto['message'])) {
                    $response =  $respProducto;
                } else {
                    $response =  $respProducto;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "createToproduct") {
            if ($_POST['selectTipoManu'] != null && $_POST['selectTipos'] != null && $_POST['selectMateriales'] != null && $_POST['selectClases'] != null && $_POST['textPrecio'] != null) {
                $modelProducto = new ProductoModel(null, 'products', 'products', $_POST['textPrecio'], $_POST['selectTipos'], $_POST['selectSubTipos'], $_POST['selectMateriales'], $_POST['selectClases'], $_POST['selectSubClases'], $_POST['selectTipoManu'], null);
                $respProducto  = ProductoController::guardarProducto($modelProducto);
                if (!isset($respProducto)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respProducto['message'])) {
                        $response =  $respProducto;
                    } else {
                        $response =  $respProducto;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'listIdToproduct') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respProducto = ProductoController::mostrarIdProducto($param);
            if (!isset($respProducto)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respProducto['status']) {
                    $response   = array(
                        "status"            =>  true,
                        "id"                =>  Openssl::encriptar($respProducto['data']['id'], $_ENV['SECRET_KEY']),
                        "description"       =>  $respProducto['data']['description'],
                        "price"             =>  $respProducto['data']['price']
                    );
                } else {
                    $response =  $respProducto;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'updateToproduct') {
            if ($_POST['textPrecio'] != null) {
                $desencriptar = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
                $modelProducto = new ProductoModel($desencriptar, 'products', 'products', $_POST['textPrecio'], null, null, null, null, null, null, null);
                $respProducto  = ProductoController::actualizarProducto($modelProducto);
                if (!isset($respProducto)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respProducto['message'])) {
                        $response =  $respProducto;
                    } else {
                        $response =  $respProducto;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'deleteToproduct') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respProducto = ProductoController::eliminarProducto($param, $_POST['enabled']);
            if (!isset($respProducto)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respProducto['message'])) {
                    $response =  $respProducto;
                } else {
                    $response =  $respProducto;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getProductoxManufactura") {
            $response = ProductoController::listarProductoxManufactura($_POST['tipo']);
            for ($i=0; $i < count($response); $i++) { 
                $response[$i]['id'] = Openssl::encriptar($response[$i]['id'],$_ENV['SECRET_KEY']);
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new ProductoAjax;
$resp->ajaxCrudProducto();
