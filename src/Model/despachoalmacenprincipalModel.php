<?php
session_start();
require '../../config/enviroment.php';

class DespachoalmacenprincipalModel
{
    private $id;
    private $dateshipping;
    private $date;
    private $quotation;

    function __construct(
        $id,
        $dateshipping,
        $date,
        $quotation
    ) {
        $this->id                   = $id;
        $this->dateshipping         = $dateshipping;
        $this->date                 = $date;
        $this->quotation            = $quotation;
    }

    public function postDespachoalmacenprincipal()
    {
        $arrayResponse = array(
            'dateshipping'  => $this->dateshipping,
            'date'          => $this->date,
            'quotation'     => $this->quotation
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'mainwarehousereception',
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
}
