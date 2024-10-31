<?php
session_start();
require '../../config/enviroment.php';
class EmpresaModel
{
    private $id;
    private $razon_social;
    private $ruc;
    private $address;
    private $fiscal_address;
    private $email;

    function __construct($id, $razon_social, $ruc, $address, $fiscal_address, $email)
    {
        $this->id               = $id;
        $this->razon_social     = $razon_social;
        $this->ruc              = $ruc;
        $this->address          = $address;
        $this->fiscal_address   = $fiscal_address;
        $this->email            = $email;
    }

    static public function getEmpresa()
    {
        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'business',
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

    public function postEmpresa()
    {
        $arrayResponse = array(
            'ruc'               => $this->ruc,
            'razon_social'      => mb_strtoupper($this->razon_social,'UTF-8'),
            'address'           => mb_strtoupper($this->address,'UTF-8'),
            'fiscal_address'    => mb_strtoupper($this->fiscal_address,'UTF-8'),
            'email'             => $this->email
        );

        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'business',
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
    public function putEmpresa()
    {
        $arrayResponse = array(
            'ruc'               => $this->ruc,
            'razon_social'      => mb_strtoupper($this->razon_social,'UTF-8'),
            'address'           => mb_strtoupper($this->address,'UTF-8'),
            'fiscal_address'    => mb_strtoupper($this->fiscal_address,'UTF-8'),
            'email'             => $this->email
        );

        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'business/' . $this->id,
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
    static public function putImage($param, $file)
    {
        $arrayResponse = [
            'img_logo_empresa_name' => $file['name'],
            'id' => $param,
            'img_logo_empresa' => base64_encode(file_get_contents($file['tmp_name']))
        ];

        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, [
            CURLOPT_URL => $url . 'businessImage',
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
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ]);

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
