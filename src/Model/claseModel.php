<?php
session_start();
require '../../config/enviroment.php';
class ClaseModel
{
    private $id;
    private $description;
    private $abbreviation;
    private $idmaterial;

    function __construct($id, $description, $abbreviation, $idmaterial)
    {
        $this->id           = $id;
        $this->description  = $description;
        $this->abbreviation  = $abbreviation;
        $this->idmaterial   = $idmaterial;
    }

    static public function getClases()
    {
        $curl = curl_init();
        $url  =$_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'classes',
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

    static public function getClasesId($param)
    {
        $curl = curl_init();
        $url = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'classes/' . $param,
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

    static public function getClasesActivos()
    {
        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'classes/list/activos',
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

    static public function getClasexMaterialActivos($param)
    {
        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'classes/materials/activos/'.$param,
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

    public function postClases()
    {
        $arrayResponse = array(
            'description'   => mb_strtoupper($this->description, 'UTF-8'),
            'abbreviation'  => mb_strtoupper($this->abbreviation, 'UTF-8'),
            'idmaterial'    => $this->idmaterial
        );

        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'classes/' . $this->id,
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

    public function putClases()
    {
        $arrayResponse = array(
            'description'   => mb_strtoupper($this->description, 'UTF-8'),
            'abbreviation'  => mb_strtoupper($this->abbreviation, 'UTF-8'),
            'idmaterial'    => $this->idmaterial
        );

        $curl = curl_init();
        $url  =  $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'classes/' . $this->id,
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

    static public function deleteClases($param, $enabled)
    {
        $arrayResponse = array(
            'enabled'  => $enabled
        );

        $curl = curl_init();
        $url  = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'classes/' . $param,
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