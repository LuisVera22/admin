<?php
session_start();
require '../../config/enviroment.php';

class CotizacionModel
{
    private $id;
    private $number_document;
    private $client;
    private $address_client;
    private $date_issue;
    private $delivery_time;
    private $forma_pago;
    private $subtotal;
    private $igv;
    private $total;
    private $adelanto;
    private $saldo;
    private $pendiente_pago;
    private $notes;
    private $descripciontotal;
    private $idstore;
    private $idtype_document;
    private $idcourier;
    private $idvendor;
    private $idtype_manufacturing;
    private $selectedItems;
    private $selectedLaboratory;
    private $selectedCuotas;

    public function __construct($id, $number_document, $client, $address_client, $date_issue, $delivery_time, $forma_pago, $subtotal, $igv, $total, $adelanto, $saldo, $pendiente_pago, $notes, $descripciontotal, $idstore, $idtype_document, $idcourier, $idvendor, $idtype_manufacturing, $selectedItems, $selectedLaboratory, $selectedCuotas)
    {
        $this->id                       = $id;
        $this->number_document          = $number_document;
        $this->client                   = $client;
        $this->address_client           = $address_client;
        $this->date_issue               = $date_issue;
        $this->delivery_time            = $delivery_time;
        $this->forma_pago               = $forma_pago;
        $this->subtotal                 = $subtotal;
        $this->igv                      = $igv;
        $this->total                    = $total;
        $this->adelanto                 = $adelanto;
        $this->saldo                    = $saldo;
        $this->pendiente_pago           = $pendiente_pago;
        $this->notes                    = $notes;
        $this->descripciontotal         = $descripciontotal;
        $this->idstore                  = $idstore;
        $this->idtype_document          = $idtype_document;
        $this->idcourier                = $idcourier;
        $this->idvendor                 = $idvendor;
        $this->idtype_manufacturing     = $idtype_manufacturing;
        $this->selectedItems            = $selectedItems;
        $this->selectedLaboratory       = $selectedLaboratory;
        $this->selectedCuotas           = $selectedCuotas;
    }

    static public function getCotizacion($local)
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation/list/' . $local,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
    static public function getIdCotizacion($param)
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation/' . $param,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
    public function postCotizacion()
    {
        $arrayResponse = array(
            'number_document'       => $this->number_document,
            'client'                => mb_strtoupper($this->client, 'UTF-8'),
            'address_client'        => mb_strtoupper($this->address_client, 'UTF-8'),
            'date_issue'            => $this->date_issue,
            'delivery_time'         => $this->delivery_time,
            'forma_pago'            => $this->forma_pago,
            'subtotal'              => $this->subtotal,
            'igv'                   => $this->igv,
            'total'                 => $this->total,
            'adelanto'              => $this->adelanto,
            'saldo'                 => $this->saldo,
            'pendiente_pago'        => $this->pendiente_pago,
            'notes'                 => mb_strtoupper($this->notes, 'UTF-8'),
            'descripciontotal'      => mb_strtoupper($this->descripciontotal, 'UTF-8'),
            'idstore'               => $this->idstore,
            'idtype_document'       => $this->idtype_document,
            'idcourier'             => $this->idcourier,
            'idvendor'              => $this->idvendor,
            'idtype_manufacturing'  => $this->idtype_manufacturing,
            'selectedItems'         => $this->selectedItems,
            'selectedLaboratory'    => $this->selectedLaboratory,
            'selectedCuotas'        => $this->selectedCuotas,
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($arrayResponse),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
    public function putCotizacion()
    {
        $arrayResponse = array(
            'number_document'       => $this->number_document,
            'client'                => mb_strtoupper($this->client, 'UTF-8'),
            'address_client'        => mb_strtoupper($this->address_client, 'UTF-8'),
            'date_issue'            => $this->date_issue,
            'delivery_time'         => $this->delivery_time,
            'forma_pago'            => $this->forma_pago,
            'subtotal'              => $this->subtotal,
            'igv'                   => $this->igv,
            'total'                 => $this->total,
            'adelanto'              => $this->adelanto,
            'saldo'                 => $this->saldo,
            'pendiente_pago'        => $this->pendiente_pago,
            'notes'                 => mb_strtoupper($this->notes, 'UTF-8'),
            'descripciontotal'      => mb_strtoupper($this->descripciontotal, 'UTF-8'),
            'idstore'               => $this->idstore,
            'idtype_document'       => $this->idtype_document,
            'idcourier'             => $this->idcourier,
            'idvendor'              => $this->idvendor,
            'idtype_manufacturing'  => $this->idtype_manufacturing,
            'selectedItems'         => $this->selectedItems,
            'selectedLaboratory'    => $this->selectedLaboratory,
            'selectedCuotas'        => $this->selectedCuotas,
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation/' . $this->id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => json_encode($arrayResponse),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
    static public function postmotivosCotizacion($arrayResponse)
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotationreason',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($arrayResponse),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
    static public function deleteCotizacion($param, $enabled)
    {
        $arrayResponse = array(
            'enabled'  => $enabled
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation/' . $param,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_POSTFIELDS => json_encode($arrayResponse),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
    static public function postCotizacionDates($desde, $hasta, $local)
    {
        $arrayResponse = array(
            'dateInicio'    => $desde,
            'dateFin'       => $hasta,
            'sede'          => $local
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation/filterDate',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($arrayResponse),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
    static public function postCotizacionFacturados($arrays_id)
    {
        $arrayResponse = array(
            'arr_id'  => $arrays_id
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation/checkfacturado',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($arrayResponse),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if ($err) {
            return $response = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
}
