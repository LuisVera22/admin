<?php
require_once '../../src/Controller/almacenController.php';
require_once '../../src/Repository/almacenRepository.php';
require '../../extensions/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class AlmacenCargarExcel
{
    public function ajaxCrudAlmacenCargarExcel()
    {
        if (isset($_FILES) && $_POST['crud'] == 'chargeStock') {
            $filesDatos     = $_FILES['archivoExcel'];
            $nombreArchivo  = $filesDatos['tmp_name'];
            $documento      = IOFactory::load($nombreArchivo);

            $hojaExcel = $documento->getSheet(0);

            $n_filas    = $hojaExcel->getHighestDataRow();

            $hojasRegistradas = 0;
            $errorCarga = 0;

            for ($i = 6; $i <= $n_filas; $i++) {
                $registroData = [
                    'codigo'                => $hojaExcel->getCell('A' . $i)->getValue(),
                    'cantidad'              => $hojaExcel->getCell('C' . $i)->getValue(),
                    'idTypeManufacturing'   => $_POST['manufactura'],
                    'idstore'               => $_POST['store']
                ];

                $responseCarga = AlmacenController::cargarAlmacen($registroData);

                if ($responseCarga['status']) {
                    // Si el registro fue generado exitosamente
                    if ($responseCarga['message'] == 'Registro Generado.') {
                        $hojasRegistradas++;
                    }
                } else {
                    // Manejo de errores
                    $errorCarga++;
                    if (isset($responseCarga['alert']) && $responseCarga['alert'] == 'rules') {
                        // Manejo de errores de validación
                        $errorDetalles[] = [
                            'fila' => 'C' . $i,
                            'tipo' => 'validacion',
                            'errores' => $responseCarga['errors']
                        ];
                    } elseif (isset($responseCarga['errors']) && strpos($responseCarga['errors'][0], 'Error al crear el registro') !== false) {
                        // Manejo de errores al crear el registro
                        $errorDetalles[] = [
                            'tipo' => 'creacion',
                            'errores' => $responseCarga['errors']
                        ];
                    } elseif (isset($responseCarga['errors']) && strpos($responseCarga['errors'][0], 'No se pudo conectar a la base de datos') !== false) {
                        // Manejo de errores de conexión a la base de datos
                        $errorDetalles[] = [
                            'tipo' => 'conexion',
                            'errores' => $responseCarga['errors']
                        ];
                    } elseif (isset($responseCarga['errors']) && strpos($responseCarga['errors'][0], 'mantenimiento') !== false) {
                        // Manejo de errores de mantenimiento
                        $errorDetalles[] = [
                            'tipo' => 'mantenimiento',
                            'errores' => $responseCarga['errors']
                        ];
                    }
                }
            }

            if ($errorCarga > 0) {
                $response = [
                    'responseJson' => 'errorCarga',
                    'detalleErrores' => $errorDetalles
                ];
            } else {
                $response = [
                    'responseJson' => 'cargado',
                    'totalData' => $hojasRegistradas
                ];
            }
        } else if (isset($_FILES) && $_POST['crud'] == 'chargeFab') {
            $filesDatos     = $_FILES['archivoExcel'];
            $nombreArchivo  = $filesDatos['tmp_name'];
            $documento      = IOFactory::load($nombreArchivo);

            $hojaExcel = $documento->getSheet(0);

            $n_filas    = $hojaExcel->getHighestDataRow();

            $hojasRegistradas = 0;
            $errorCarga = 0;

            for ($i = 6; $i <= $n_filas; $i++) {
                $registroData = [
                    'codigo'                => $hojaExcel->getCell('A' . $i)->getValue(),
                    'cantidad'              => $hojaExcel->getCell('C' . $i)->getValue(),
                    'idTypeManufacturing'   => $_POST['idTypeManufacturing'],
                    'idstore'               => $_POST['idstore']
                ];

                $responseCarga = AlmacenController::cargarAlmacen($registroData);

                if ($responseCarga['status']) {
                    // Si el registro fue generado exitosamente
                    if ($responseCarga['message'] == 'Registro Generado.') {
                        $hojasRegistradas++;
                    }
                } else {
                    // Manejo de errores
                    $errorCarga++;
                    if (isset($responseCarga['alert']) && $responseCarga['alert'] == 'rules') {
                        // Manejo de errores de validación
                        $errorDetalles[] = [
                            'fila' => 'C' . $i,
                            'tipo' => 'validacion',
                            'errores' => $responseCarga['errors']
                        ];
                    } elseif (isset($responseCarga['errors']) && strpos($responseCarga['errors'][0], 'Error al crear el registro') !== false) {
                        // Manejo de errores al crear el registro
                        $errorDetalles[] = [
                            'tipo' => 'creacion',
                            'errores' => $responseCarga['errors']
                        ];
                    } elseif (isset($responseCarga['errors']) && strpos($responseCarga['errors'][0], 'No se pudo conectar a la base de datos') !== false) {
                        // Manejo de errores de conexión a la base de datos
                        $errorDetalles[] = [
                            'tipo' => 'conexion',
                            'errores' => $responseCarga['errors']
                        ];
                    } elseif (isset($responseCarga['errors']) && strpos($responseCarga['errors'][0], 'mantenimiento') !== false) {
                        // Manejo de errores de mantenimiento
                        $errorDetalles[] = [
                            'tipo' => 'mantenimiento',
                            'errores' => $responseCarga['errors']
                        ];
                    }
                }
            }

            if ($errorCarga > 0) {
                $response = [
                    'responseJson' => 'errorCarga',
                    'detalleErrores' => $errorDetalles
                ];
            } else {
                $response = [
                    'responseJson' => 'cargado',
                    'totalData' => $hojasRegistradas
                ];
            }
        } else {
            $response = array('responseJson' => 'errorArchivo');
        }
        echo json_encode($response);
    }
}
$resp = new AlmacenCargarExcel;
$resp->ajaxCrudAlmacenCargarExcel();
