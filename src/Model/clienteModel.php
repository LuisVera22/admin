<?php
session_start();
require '../../config/enviroment.php';
class ClienteModel
{
    private $id;
    private $codigo;
    private $number_document;
    private $names;
    private $lastnames;
    private $bussinesnames;
    private $tradename;
    private $address;
    private $address_fiscal;
    private $email;
    private $cell_phone;
    private $idtype_document;

    function __construct($id, $codigo, $number_document, $names, $lastnames, $bussinesnames, $tradename, $address, $address_fiscal, $email, $cell_phone, $idtype_document)
    {
        $this->id               =   $id;
        $this->codigo           =   $codigo;
        $this->number_document  =   $number_document;
        $this->names            =   $names;
        $this->lastnames        =   $lastnames;
        $this->bussinesnames    =   $bussinesnames;
        $this->tradename        =   $tradename;
        $this->address          =   $address;
        $this->address_fiscal   =   $address_fiscal;
        $this->email            =   $email;
        $this->cell_phone       =   $cell_phone;
        $this->idtype_document  =   $idtype_document;
    }

    static public function getCliente()
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'clients',
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

    static public function getClienteId($param)
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'clients/' . $param,
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
    static public function getClienteActivo()
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'clients',
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
    public function postCliente()
    {
        $arrayResponse = array(
            'codigo'            => $this->codigo,
            'number_document'   => $this->number_document,
            'names'             => mb_strtoupper($this->names, 'UTF-8'),
            'lastnames'         => mb_strtoupper($this->lastnames, 'UTF-8'),
            'bussinesnames'     => mb_strtoupper($this->bussinesnames, 'UTF-8'),
            'tradename'         => mb_strtoupper($this->tradename, 'UTF-8'),
            'address'           => mb_strtoupper($this->address, 'UTF-8'),
            'address_fiscal'    => mb_strtoupper($this->address_fiscal, 'UTF-8'),
            'email'             => $this->email,
            'cell_phone'        => $this->cell_phone,
            'idtype_document'   => $this->idtype_document
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'clients',
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

    public function putCliente()
    {
        $arrayResponse = array(
            'number_document'   => $this->number_document,
            'names'             => mb_strtoupper($this->names, 'UTF-8'),
            'lastnames'         => mb_strtoupper($this->lastnames, 'UTF-8'),
            'bussinesnames'     => mb_strtoupper($this->bussinesnames, 'UTF-8'),
            'tradename'         => mb_strtoupper($this->tradename, 'UTF-8'),
            'address'           => mb_strtoupper($this->address, 'UTF-8'),
            'address_fiscal'    => mb_strtoupper($this->address_fiscal, 'UTF-8'),
            'email'             => $this->email,
            'cell_phone'        => $this->cell_phone,
            'idtype_document'   => $this->idtype_document
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'clients/' . $this->id,
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

    static public function deleteCliente($param, $enabled)
    {
        $arrayResponse = array(
            'enabled'  => $enabled
        );

        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'clients/' . $param,
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

    static public function getsearchDocumentosId($param)
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'typedocuments/' . $param,
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
}
