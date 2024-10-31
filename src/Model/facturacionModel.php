<?php
session_start();
require '../../config/enviroment.php';

class FacturacionModel
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
    private $docserie;
    private $serie;
    private $numserie;
    private $estadofe;
    private $observacionfe;
    private $correlativebaja;
    private $correlativeresumen;
    private $tiponota;
    private $motivonota;
    private $anexado;
    private $motivobaja;
    private $listquotation;
    private $idcorrelative;
    private $idtype_document;
    private $idvendor;
    private $idstore;
    private $selectedItems;
    private $selectedCuotas;

    public function __construct($id, $number_document, $client, $address_client, $date_issue, $delivery_time, $forma_pago, $subtotal, $igv, $total, $docserie, $serie, $numserie, $estadofe, $observacionfe, $correlativebaja, $correlativeresumen, $tiponota, $motivonota,$anexado,$motivobaja,$listquotation,$idcorrelative,$idtype_document,$idvendor,$idstore,$selectedItems,$selectedCuotas)
    {
        $this->id                   = $id;
        $this->number_document      = $number_document;
        $this->client               = $client;
        $this->address_client       = $address_client;
        $this->date_issue           = $date_issue;
        $this->delivery_time        = $delivery_time;
        $this->forma_pago           = $forma_pago;
        $this->subtotal             = $subtotal;
        $this->igv                  = $igv;
        $this->total                = $total;
        $this->docserie             = $docserie;
        $this->serie                = $serie;
        $this->numserie             = $numserie;
        $this->estadofe             = $estadofe;
        $this->observacionfe        = $observacionfe;
        $this->correlativebaja      = $correlativebaja;
        $this->correlativeresumen   = $correlativeresumen;
        $this->tiponota             = $tiponota;
        $this->motivonota           = $motivonota;
        $this->anexado              = $anexado;
        $this->motivobaja           = $motivobaja;
        $this->listquotation        = $listquotation;
        $this->idcorrelative        = $idcorrelative;
        $this->idtype_document      = $idtype_document;
        $this->idvendor             = $idvendor;
        $this->idstore              = $idstore;
        $this->selectedItems        = $selectedItems;
        $this->selectedCuotas       = $selectedCuotas;
    }

    static public function getViewCotizacion($arrays_id)
    {
        $arrayResponse = array(
            'arr_id'  => $arrays_id
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'quotation/convertsales',
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
