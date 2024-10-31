<?php
require_once '../../src/Controller/cotizacionController.php';
require_once '../../src/Repository/cotizacionRepository.php';
require_once '../../lib/openssl.php';
require_once '../../config/enviroment.php';

class CotizacionAjax
{
    public function ajaxCrudCotizacion()
    {
        if (isset($_POST['crud']) && $_POST['crud'] == 'create') {

            $selectedItems = [];
            $selectedLaboratory = [];
            $selectedCuotas = [];

            foreach ($_POST['items'] as $items) {
                $desencriptar = Openssl::desencriptar($items['idproduct'], $_ENV['SECRET_KEY']);
                $selectedItems[] = array(
                    'description'           => $items['description'],
                    'detail_manufacturing'  => $items['detail_manufacturing'],
                    'unidadmedida'          => $items['unidadmedida'],
                    'quantity'              => $items['quantity'],
                    'price'                 => $items['price'],
                    'discount'              => $items['discount'],
                    'pricesinigv'           => $items['pricesinigv'],
                    'subtotal'              => $items['subtotal'],
                    'igv'                   => $items['igv'],
                    'total'                 => $items['total'],
                    'idproduct'             => $desencriptar,
                    'commonId'              => $items['commonId']
                );
            }

            if (!empty($_POST['laboratory'])) {
                foreach ($_POST['laboratory'] as $laboratory) {
                    $selectedLaboratory[] = array(
                        'esfod'             => $laboratory['esfod'],
                        'cylod'             => $laboratory['cilod'],
                        'addod'             => $laboratory['addod'],
                        'ejeod'             => $laboratory['ejeod'],
                        'prismaod'          => $laboratory['prismaod'],
                        'altod'             => $laboratory['altod'],
                        'dipod'             => $laboratory['dipod'],
                        'diametrood'        => $laboratory['diametrood'],
                        'esfoi'             => $laboratory['esfoi'],
                        'cyloi'             => $laboratory['ciloi'],
                        'addoi'             => $laboratory['ejeoi'],
                        'ejeoi'             => $laboratory['addoi'],
                        'prismaoi'          => $laboratory['prismaoi'],
                        'altoi'             => $laboratory['altoi'],
                        'dipoi'             => $laboratory['dipoi'],
                        'diametrooi'        => $laboratory['diametrooi'],
                        'v'                 => $laboratory['v'],
                        'h'                 => $laboratory['h'],
                        'd'                 => $laboratory['d'],
                        'pte'               => $laboratory['pte'],
                        'alt'               => $laboratory['alt'],
                        'dip'               => $laboratory['dip'],
                        'inicialespaciente' => $laboratory['inicialespacientes'],
                        'diametro'          => $laboratory['diametro'],
                        'corredor'          => $laboratory['corredor'],
                        'reduccion'         => $laboratory['reduccion'],
                        'commonId'          => $laboratory['commonId'],
                    );
                }
            }

            if (!empty($_POST['cuotas'])) {
                foreach ($_POST['cuotas'] as $cuotas) {
                    $selectedCuotas[] = array(
                        'monto'         => $cuotas['monto'],
                        'fecha'         => date("Y-m-d", strtotime($cuotas['fecha']))
                    );
                }
            }

            $fecha1 = DateTime::createFromFormat('d/m/Y', $_POST['fechaemision']);
            $fechaemision = $fecha1->format('Y-m-d');

            $modalCotizacion = new CotizacionModel(null, $_POST['numerodocumento'], $_POST['cliente'], $_POST['direccion'], $fechaemision, $_POST['tiempoentrega'], $_POST['formapago'], $_POST['subtotal'], $_POST['igv'], $_POST['total'], $_POST['adelanto'], $_POST['saldo'], $_POST['pendientepago'], $_POST['observacion'], $_POST['descripcionTotal'], $_POST['idsede'], $_POST['iddocumento'], $_POST['idmensajero'], $_POST['idvendedor'], $_POST['idtipomanufacturacion'], $selectedItems, $selectedLaboratory, $selectedCuotas);
            $respCotizacion = CotizacionController::guardarCotizacion($modalCotizacion);
            if (!isset($respCotizacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCotizacion['message'])) {
                    $response =  $respCotizacion;
                } else {
                    $response =  $respCotizacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'update') {
            $selectedItems = [];
            $selectedLaboratory = [];
            $selectedCuotas = [];

            foreach ($_POST['items'] as $items) {
                $desencriptar = Openssl::desencriptar($items['idproduct'], $_ENV['SECRET_KEY']);
                $quotationDetail = isset($items['idDetail']) ? Openssl::desencriptar($items['idDetail'], $_ENV['SECRET_KEY']) : null;

                $selectedItems[] = array(
                    'idDetail'              => $quotationDetail,
                    'description'           => $items['description'],
                    'detail_manufacturing'  => $items['detail_manufacturing'],
                    'unidadmedida'          => $items['unidadmedida'],
                    'quantity'              => $items['quantity'],
                    'price'                 => $items['price'],
                    'discount'              => $items['discount'],
                    'pricesinigv'           => $items['pricesinigv'],
                    'subtotal'              => $items['subtotal'],
                    'igv'                   => $items['igv'],
                    'total'                 => $items['total'],
                    'idproduct'             => $desencriptar,
                    'commonId'              => $items['commonId']
                );
            }

            if (!empty($_POST['laboratory'])) {
                foreach ($_POST['laboratory'] as $laboratory) {

                    $quotationDetail = Openssl::desencriptar($laboratory['idDetail'], $_ENV['SECRET_KEY']) ?? null;

                    $selectedLaboratory[] = array(
                        'idDetail'          => $quotationDetail,
                        'esfod'             => $laboratory['esfod'] ?? null,
                        'cylod'             => $laboratory['cilod'] ?? null,
                        'addod'             => $laboratory['addod'] ?? null,
                        'ejeod'             => $laboratory['ejeod'] ?? null,
                        'prismaod'          => $laboratory['prismaod'] ?? null,
                        'altod'             => $laboratory['altod'] ?? null,
                        'dipod'             => $laboratory['dipod'] ?? null,
                        'diametrood'        => $laboratory['diametrood'] ?? null,
                        'esfoi'             => $laboratory['esfoi'] ?? null,
                        'cyloi'             => $laboratory['ciloi'] ?? null,
                        'addoi'             => $laboratory['ejeoi'] ?? null,
                        'ejeoi'             => $laboratory['addoi'] ?? null,
                        'prismaoi'          => $laboratory['prismaoi'] ?? null,
                        'altoi'             => $laboratory['altoi'] ?? null,
                        'dipoi'             => $laboratory['dipoi'] ?? null,
                        'diametrooi'        => $laboratory['diametrooi'] ?? null,
                        'v'                 => $laboratory['v'] ?? null,
                        'h'                 => $laboratory['h'] ?? null,
                        'd'                 => $laboratory['d'] ?? null,
                        'pte'               => $laboratory['pte'] ?? null,
                        'alt'               => $laboratory['alt'] ?? null,
                        'dip'               => $laboratory['dip'] ?? null,
                        'inicialespaciente' => $laboratory['inicialespacientes'] ?? null,
                        'diametro'          => $laboratory['diametro'] ?? null,
                        'corredor'          => $laboratory['corredor'] ?? null,
                        'reduccion'         => $laboratory['reduccion'] ?? null,
                        'commonId'          => $laboratory['commonId'] ?? null
                    );
                }
            }

            if (!empty($_POST['cuotas'])) {
                foreach ($_POST['cuotas'] as $cuotas) {
                    $quotationCuotas = Openssl::desencriptar($cuotas['idCuotas'], $_ENV['SECRET_KEY']) ?? null;

                    $selectedCuotas[] = array(
                        'idCuotas'      => $quotationCuotas,
                        'monto'         => $cuotas['monto'],
                        'fecha'         => date("Y-m-d", strtotime($cuotas['fecha']))
                    );
                }
            }

            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);

            $fecha1 = DateTime::createFromFormat('d/m/Y', $_POST['fechaemision']);
            $fechaemision = $fecha1->format('Y-m-d');

            $modalCotizacion = new CotizacionModel($param, $_POST['numerodocumento'], $_POST['cliente'], $_POST['direccion'], $fechaemision, $_POST['tiempoentrega'], $_POST['formapago'], $_POST['subtotal'], $_POST['igv'], $_POST['total'], $_POST['adelanto'], $_POST['saldo'], $_POST['pendientepago'], $_POST['observacion'], $_POST['descripcionTotal'], $_POST['idsede'], $_POST['iddocumento'], $_POST['idmensajero'], $_POST['idvendedor'], $_POST['idtipomanufacturacion'], $selectedItems, $selectedLaboratory, $selectedCuotas);
            $respCotizacion = CotizacionController::actualizarCotizacion($modalCotizacion);
            if (!isset($respCotizacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCotizacion['message'])) {
                    $response =  $respCotizacion;
                } else {
                    $response =  $respCotizacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'delete') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCotizacion = CotizacionController::eliminarCotizacion($param, $_POST['enabled']);
            if (!isset($respCotizacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCotizacion['message'])) {
                    $response =  $respCotizacion;
                } else {
                    $response =  $respCotizacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'reason') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $arrayResponse = array(
                'typereason'    => 'update',
                'reason'        => $_POST['motivo-text'],
                'datetime'      => date('Y-m-d h:i:s'),
                'idquotation'   => $param
            );

            $respCotizacion = CotizacionController::motivoCotizacion($arrayResponse);
            if (!isset($respCotizacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if (isset($respCotizacion['message'])) {
                    $response =  $respCotizacion;
                } else {
                    $response =  $respCotizacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getQuotation') {
            $param = Openssl::desencriptar($_POST['param'], $_ENV['SECRET_KEY']);
            $respCotizacion = CotizacionController::listarIdCotizacion($param);
            if (!isset($respCotizacion)) {
                $response = array('responseJson' => "no server");
            } else {
                if ($respCotizacion['status']) {

                    foreach ($respCotizacion['data']['quotationdetail'] as &$detail) {
                        $detail['id'] = Openssl::encriptar($detail['id'], $_ENV['SECRET_KEY']);
                        $detail['idproduct'] = Openssl::encriptar($detail['idproduct'], $_ENV['SECRET_KEY']);
                        $detail['idquotation'] = Openssl::encriptar($detail['idquotation'], $_ENV['SECRET_KEY']);
                        if (isset($detail['laboratory'])) {
                            $detail['laboratory']['idquotationdetail'] = Openssl::encriptar($detail['laboratory']['idquotationdetail'], $_ENV['SECRET_KEY']);
                        }
                    }

                    foreach ($respCotizacion['data']['quotationcuotas'] as &$detailCuotas) {
                        $detailCuotas['id'] = Openssl::encriptar($detailCuotas['id'], $_ENV['SECRET_KEY']);
                        $detailCuotas['idquotation'] = Openssl::encriptar($detailCuotas['idquotation'], $_ENV['SECRET_KEY']);
                    }

                    $response   = array(
                        "status"                =>  true,
                        "idtype_document"       =>  $respCotizacion['data']['idtype_document'],
                        "number_document"       =>  $respCotizacion['data']['number_document'],
                        "client"                =>  $respCotizacion['data']['client'],
                        "address_client"        =>  $respCotizacion['data']['address_client'],
                        "idtype_manufacturing"  =>  $respCotizacion['data']['idtype_manufacturing'],
                        "date_issue"            =>  $respCotizacion['data']['date_issue'],
                        "delivery_time"         =>  $respCotizacion['data']['delivery_time'],
                        "idcourier"             =>  $respCotizacion['data']['idcourier'],
                        "idvendor"              =>  $respCotizacion['data']['idvendor'],
                        "idvendor"              =>  $respCotizacion['data']['idvendor'],
                        "idstore"               =>  $respCotizacion['data']['idstore'],
                        "forma_pago"            =>  $respCotizacion['data']['forma_pago'],
                        "notes"                 =>  $respCotizacion['data']['notes'],
                        "quotationdetail"       =>  $respCotizacion['data']['quotationdetail'],
                        "quotationcuotas"       =>  $respCotizacion['data']['quotationcuotas'],
                    );
                } else {
                    $response =  $respCotizacion;
                }
            }
        } else if (isset($_POST['crud']) && $_POST['crud'] == 'getFacturados') {
            $arrays_id = [];
            foreach ($_POST['arrays_id'] as $itemsArrays) {
                $params = Openssl::desencriptar($itemsArrays, $_ENV['SECRET_KEY']);
                $arrays_id[] = $params;
            }
            $response = CotizacionController::listarCotizacionFacturados($arrays_id);
            //$new = array('arr_id' => $arrays_id);
        }
        echo json_encode($response);
    }
}
$resp = new CotizacionAjax;
$resp->ajaxCrudCotizacion();
?>