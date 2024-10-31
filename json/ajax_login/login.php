<?php
session_save_path(null);
session_start(['cookie_lifetime' => 86400]);
require_once '../../src/Repository/loginRepository.php';
require_once '../../src/Controller/loginController.php';
class AjaxLogin
{
    public function postLogin()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == 'loginAdmin') {
            if ($_POST['username'] != null && $_POST['password'] != null) {
                $responseController = LoginController::authenticate($_POST['username'], $_POST['password']);
                if (!isset($responseController)) {
                    $response = array('responseJson' => "no server");
                } else {
                    if ($responseController['status']) {
                        $_SESSION['token']  = $responseController['token'];
                        $_SESSION['name']   = $responseController['data']['username'];
                        $_SESSION['idrol']  = $responseController['data']['role']['id'];
                        $_SESSION['rol']    = $responseController['data']['role']['description'];
                        if (isset($responseController['data']['employee'])) {
                            $_SESSION['employee'] = $responseController['data']['employee'];
                        } else {
                            $_SESSION['employee'] = null;
                        }

                        if(isset($responseController['data']['employee']['store']['address'])){
                            $_SESSION['address']  = $responseController['data']['employee']['store']['address'];
                        }else{
                            $_SESSION['address'] = null;
                        }
                        $_SESSION['rol']    = $responseController['data']['role']['description'];
                        
                        $response = $responseController;
                    } else {
                        $response = $responseController;
                    }
                }
            } else {
                $response = array('responseJson'    => 'no vacios');
            }
        } else {
            $response = array('responseJson'    => 'error');
        }
        echo json_encode($response);
    }
}

$resp = new AjaxLogin;
$resp->postLogin();
