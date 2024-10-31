<?php
require_once '../../src/Controller/almacenController.php';
require_once '../../src/Repository/almacenRepository.php';

class AlmacenExportarStockAjax
{
    public function ajaxCrudAlmacenExportar()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == "exportStock") {
            if ($_POST['manufactura'] != null) {
                $response  = AlmacenController::exportarAlmacen($_POST['manufactura']);                
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == "exportFab"){
            if ($_POST['manufactura'] != null) {
                $response  = AlmacenController::exportarAlmacen($_POST['manufactura']);                
            } else {
                $response = array('responseJson' => 'no vacios');
            }
        } else {
            $response = array('responseJson' => "error");
        }
        echo $response;
    }
}

$resp = new AlmacenExportarStockAjax;
$resp->ajaxCrudAlmacenExportar();