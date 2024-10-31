<?php

require_once '../../src/Repository/cambiarpasswordRepository.php';
require_once '../../src/Controller/cambiarpasswordController.php';

class CambiarpasswordAjax
{
    public function ajaxCambiarpassword()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == 'send') {

            if ($_POST['textCorreo'] != null && $_POST['textNuevoPassword'] != null && $_POST['textConfirmarPassword'] != null) {
                // Lógica de cambio de contraseña
                $respPassword = CambiarpasswordController::cambiarPassword($_POST['textCorreo'], $_POST['textNuevoPassword']);

                // Verifica la respuesta del controlador
                if (!isset($respPassword)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if (isset($respPassword['message'])) {
                        $response = $respPassword;
                    } else {
                        $response = $respPassword;
                    }
                }
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo json_encode($response);
    }
}
$respPassword = new CambiarpasswordAjax;
$respPassword->ajaxCambiarpassword();
