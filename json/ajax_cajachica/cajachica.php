<?php
require_once '../../src/Repository/cajachicaRepository.php';
require_once '../../src/Controller/cajachicaController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class CajachicaAjax
{
    public function ajaxCrudCajachica()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "create") {
            if (!empty($_POST['textDescription']) && !empty($_POST['amount']) && !empty($_FILES['imgCajachica']['name'])) {

                if (isset($_FILES['imgCajachica']) && $_FILES['imgCajachica']['error'] == 0) {
                    $descripcion = $_POST['textDescription'];
                    $monto = $_POST['amount'];
                    $file = $_FILES['imgCajachica'];
                    $mimetype = $file['type'];

                    $validImageTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];
                    $validPdfType = 'application/pdf';
                    $validWordTypes = ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

                    if (in_array($mimetype, $validImageTypes) || $mimetype == $validPdfType || in_array($mimetype, $validWordTypes)) {

                        $cajachica = new CajachicaModel(null, $descripcion, $monto);

                        $respCajachica = CajachicaController::guardarCajaChica($cajachica, $file);

                        if (isset($respCajachica)) {
                            $response = $respCajachica;
                        } else {
                            $response = array('responseJson' => "no server");
                        }
                    } else {
                        $response = array('responseJson' => 'no valido');
                    }
                } else {
                    $response = array('responseJson' => 'file error');
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "update") {
            if ($_POST['param']!=null && ($_POST['textDescription'])!=null && ($_POST['amount'])!=null) {
                
                $idCajaChica = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            
                $descripcion = $_POST['textDescription'];
                $monto = $_POST['amount'];
                $img_petty_cash_name = $_POST['textImg'];

                // Comprobamos si se ha enviado un archivo
                if (!empty($_FILES['newFile']['name'])) {
                    // Verificamos que el tipo de archivo sea válido
                    $mimetype = $_FILES['newFile']['type'];
                    $validImageTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];
                    $validPdfType = 'application/pdf';
                    $validWordTypes = ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            
                    // Validamos si el archivo tiene un tipo permitido
                    if (in_array($mimetype, $validImageTypes) || $mimetype == $validPdfType || in_array($mimetype, $validWordTypes)) {
                        // Si el archivo es válido, continuamos procesando
                        $file = $_FILES['newFile'];
                    } else {
                        
                        $response = array('responseJson' => 'Tipo de archivo no válido');
                    }
                } else {
                    // Si no hay archivo, usamos el valor de img_petty_cash_name pasado por POST
                    // Si no se pasó, usamos el valor actual almacenado en la base de datos o en el modelo
                    
                    $file=null;
                } 
            
                // Crear el objeto CajaChica con los nuevos valores
                $cajachica = new CajachicaModel($idCajaChica, $descripcion, $monto);

            
                // Llamar al controlador para actualizar los datos en la base de datos, pasando también el archivo (si es válido)
                $respCajachica = CajachicaController::actualizarCajaChica($cajachica, $file, $img_petty_cash_name);
            
                // Responder dependiendo del resultado
                if ($respCajachica) {
                    // Si la respuesta es válida, devolver la respuesta en formato JSON
                    $response = $respCajachica;
                } else {
                    // Si no se pudo actualizar, devolver un error
                    $response = ['responseJson' => 'Error en el servidor al actualizar'];
                }
            } else {
                // Si falta el parámetro textId (que es obligatorio), devolver un error
                $response = ['responseJson' => 'vacio'];
            }
            
        } else if (isset($_POST['crud']) && $_POST['crud'] == "listId") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCajachica = CajachicaController::mostrarIdCajachica($param);
            if (!isset($respCajachica)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respCajachica['status']) {
                    $response = array(
                        "id"            => Openssl::encriptar($respCajachica['data']['id'], $_ENV['SECRET_KEY']),
                        "date"          => $respCajachica['data']['date'],
                        "time"          => $respCajachica['data']['time'],
                        "description"   => $respCajachica['data']['description'],
                        "amount"        => $respCajachica['data']['amount'],
                        "username"      => $respCajachica['data']['username'],
                        "img_petty_cash_name" => $respCajachica['data']['img_petty_cash_name'],
                        "img_petty_cash_url" => $respCajachica['data']['img_petty_cash_url']
                    );
                } else {
                    $response = $respCajachica;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "getIdInfo") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCajachica = CajachicaController::mostrarIdCajachica($param);
            if (!isset($respCajachica)) {
                $response = array('responseJson' => "no server");
            } else {
                $response = array(
                    "id"            => Openssl::encriptar($respCajachica['data']['id'], $_ENV['SECRET_KEY']),
                    "date"          => $respCajachica['data']['date'],
                    "time"          => $respCajachica['data']['time'],
                    "description"   => $respCajachica['data']['description'],
                    "amount"        => $respCajachica['data']['amount'],
                    "username"      => $respCajachica['data']['username'],
                    "img_petty_cash_name" => $respCajachica['data']['img_petty_cash_name'],
                    "img_petty_cash_url" => $respCajachica['data']['img_petty_cash_url']
                );
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "delete") {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);

            $respCajachica = CajachicaController::eliminarCajachica($param);

            if ($respCajachica && isset($respCajachica['status'])) {
                $response = $respCajachica;
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Error al eliminar el registro. Inténtalo de nuevo.'
                );
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}

$resp = new CajachicaAjax();
$resp->ajaxCrudCajachica();
