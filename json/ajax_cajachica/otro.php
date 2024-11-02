<?php
require_once '../../src/Repository/cajachicaRepository.php';
require_once '../../src/Controller/cajachicaController.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class Otro
{
    public function ajaxCrudCajachica() {
        $response = array('responseJson' => 'error', 'message' => 'Operación no válida');

        if (isset($_POST['crud'])) {
            $crudType = $_POST['crud'];

            switch ($crudType) {
                case 'create':
                    /*Crear un nuevo registro de caja chica*/
                    $description = $_POST['description'] ?? null;
                    $amount = $_POST['amount'] ?? null;
                    $username = $_POST['username'] ?? null;
                    $img_petty_cash_name = $_POST['img_petty_cash_name'] ?? null;

                    if ($description && $amount && $username && $img_petty_cash_name) {
                        $cajachica = new CajachicaModel(null, null,null, $description, $amount, $username, $img_petty_cash_name);
                        $response = CajachicaController::guardarCajaChica($cajachica);
                    } else {
                        $response['message'] = 'Todos los campos son obligatorios';
                    }
                    break;

                case 'update':
                    /*Actualizar un registro de caja chica existente*/
                    $id = $_POST['id'] ?? null;
                    $description = $_POST['description'] ?? null;
                    $amount = $_POST['amount'] ?? null;
                    $username = $_POST['username'] ?? null;
                    $img_petty_cash_name = $_POST['img_petty_cash_name'] ?? null;

                    if ($id && $description && $amount && $username) {
                        $cajachica = new CajachicaModel($id, null,null, $description, $amount, $username, $img_petty_cash_name);
                        $response = CajachicaController::actualizarCajachica($cajachica);
                    } else {
                        $response['message'] = 'Todos los campos excepto la imagen son obligatorios';
                    }
                    break;

                case 'getIdInfo':
                    /*Obtener información detallada de un registro específico de caja chica*/
                    $param = $_POST['param'] ?? null;
                    if ($param) {
                        $id = Openssl::desencriptar($param, $_ENV['SECRET_KEY']);
                        $response = CajachicaController::mostrarIdCajaChica($id);
                    } else {
                        $response['message'] = 'ID no proporcionado';
                    }
                    break;

                case 'delete':
                    /*Eliminar un registro específico de caja chica*/
                    $param = $_POST['param'] ?? null;
                    if ($param) {
                        $id = Openssl::desencriptar($param, $_ENV['SECRET_KEY']);
                        $response = CajachicaController::eliminarCajachica($id);
                    } else {
                        $response['message'] = 'ID no proporcionado';
                    }
                    break;

                case 'getCajachica':
                    /*Listar todos los registros de caja chica*/
                    $response = CajachicaController::mostrarCajachica();
                    break;

                default:
                    $response['message'] = 'Operación no reconocida';
                    break;
            }
        }

        echo json_encode($response);
    }
}

$resp = new CajachicaAjax();
$resp->ajaxCrudCajachica();