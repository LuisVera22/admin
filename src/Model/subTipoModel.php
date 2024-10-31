<?php
session_start();
require '../../config/enviroment.php';
class SubtipoModel
{
    private $id;
    private $description;
    private $abbreviation;
    private $idtipo;

    function __construct($id, $description, $abbreviation,$idtipo)
    {
        $this->id           = $id;
        $this->description  = $description;
        $this->abbreviation  = $abbreviation;
        $this->idtipo       = $idtipo;
    }

    static public function getSubTipo()
    {
        $curl = curl_init();
        $url  =$_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'subtype',
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
        if($err) {
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

    static public function getSubTipoId($param)
    {
        $curl = curl_init();
        $url = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'subtype/' . $param,
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
        if($err) {
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

    static public function getSubTipoActivos()
    {
        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'subtype/list/activos',
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
            return $reponse = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $reponse = curl_exec($curl);
            $responseArray = json_decode($reponse, true);
            return $responseArray;
        }
        curl_close($curl);
    }

    static public function getSubTiposxTipo($param)
    {
        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'subtype/type/activos/'.$param,
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
            return $reponse = array(
                'responseJson' => 'not fount URL'
            );
        } else {
            $reponse = curl_exec($curl);
            $responseArray = json_decode($reponse, true);
            return $responseArray;
        }
        curl_close($curl);
    }

    public function postSubTipo()
    {
        $arrayResponse = array(
            'description'   => mb_strtoupper($this->description,'UTF-8'),
            'abbreviation'   => mb_strtoupper($this->abbreviation,'UTF-8'),
            'idtype'        => $this->idtipo
        );

        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'subtype/' . $this->id,
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
        if($err) {
            return $response = array(
                'responseJson'  =>  'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray =json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }

    public function putSubTipo()
    {
        $arrayResponse = array(
            'description'   => mb_strtoupper($this->description,'UTF-8'),
            'abbreviation'   => mb_strtoupper($this->abbreviation,'UTF-8'),
            'idtype'        => $this->idtipo
        );

        $curl = curl_init();
        $url  =  $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'subtype/' . $this->id,
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
                'responseJson'  =>  'not fount URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }

    static public function deleteSubTipo($param, $enabled)
    {
        $arrayResponse = array(
            'enabled'  => $enabled
        );

        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'subtype/' . $param,
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
                'responseJson' => 'not found URL'
            );
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }
        curl_close($curl);
    }
}
?>