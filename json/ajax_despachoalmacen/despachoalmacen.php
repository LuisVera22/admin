<?php
require_once '../../src/Controller/despachoalmacenprincipalController.php';
require_once '../../src/Repository/despachoalmacenprincipalRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class DespachoalmacenprincipalAjax
{
    public function ajaxCrudDespachoalmacenprincipal()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == 'sendAlmacenRbc') 
        {
            $dateshipping = date('Y-m-d H:i:s');
            $date = date('Y-m-d');
            $quotation = [];

            foreach ($_POST['batchData'] as $item) { 
                $desencriptar = Openssl::desencriptar($item['ordenesTrabajo'],$_ENV['SECRET_KEY']);

                $quotation[] = array(
                    'idquotation'       => $desencriptar
                );
            }

            $modaldespachoalmacenprincipal = new DespachoalmacenprincipalModel(null,$dateshipping,$date,$quotation);
            $respDespachoalmacenprincipal = DespachoalmacenprincipalController::guardarDespachoalmacenprincipal($modaldespachoalmacenprincipal);

            if(!isset($respDespachoalmacenprincipal)){
                $response = array('responseJson' => "no server");
            }else{
                if (isset($respDespachoalmacenprincipal['message'])) {
                    $response =  $respDespachoalmacenprincipal;
                } else {
                    $response =  $respDespachoalmacenprincipal;
                }
            }
        }
        echo json_encode($response);
    
    }
}
$resp = new DespachoalmacenprincipalAjax;
$resp->ajaxCrudDespachoalmacenprincipal();