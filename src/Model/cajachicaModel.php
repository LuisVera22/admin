<?php
session_start();
require '../../config/enviroment.php';

class CajachicaModel
{
    private $id;
    private $date;
    private $time;
    private $description;
    private $amount;
    private $img_petty_cash_name;

    public function __construct($id, $description, $amount) {
        $this->id = $id;
        $this->description = $description;
        $this->amount = $amount;
    }

    static public function getCajachica()
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'pettycash',
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

    static public function getCajachicaId($param)
    {
        $curl = curl_init();
        $url   = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'pettycash/' . $param,
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

    public function postCajachica($file)
    {
        $description = $this->description;
        $amount = $this->amount;

        $img_petty_cash_name = $file['name'];
        $img_petty_cash = base64_encode(file_get_contents($file['tmp_name']));

        $arrayResponse = array(
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'description' => mb_strtoupper($description, 'UTF-8'),
            'amount' => $amount,
            'username' => $_SESSION['name'],
            'img_petty_cash_name' => $img_petty_cash_name,
            'img_petty_cash' => $img_petty_cash
        );

        $curl = curl_init();
        $url = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'pettycash',
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
            return array('responseJson' => 'not found URL');
        } else {
            $response = curl_exec($curl);
            $responseArray = json_decode($response, true);
            return $responseArray;
        }

    }

    public function putCajachica($file, $imgpettycashname){
        

        if (isset($file['name'])){
            $img_petty_cash_name = $file['name'];
            $img_petty_cash = base64_encode(file_get_contents($file['tmp_name']));
        } else {
            $img_petty_cash_name = $imgpettycashname;
            $img_petty_cash = null;
        }

        $arrayResponse = array(
            'description' => mb_strtoupper($this->description, 'UTF-8'),
            'amount' => $this->amount,
            'img_petty_cash_name' => $img_petty_cash_name,
            'img_petty_cash' => $img_petty_cash
        );

        $curl = curl_init();
        $url = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'pettycash/'.$this->id,
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
        if($err){
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

    static public function deleteCajachicaId($param){

        $curl = curl_init();
        $url = $_ENV['URL'];
        curl_setopt_array($curl,array(
            CURLOPT_URL => $url . 'pettycash/' . $param,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $err = curl_error($curl);
        if($err){
            return $response = array(
                'reponseJson' => 'not found URL'
            );
        } else {
            $response = curl_exec( $curl);
            $responseArray = json_decode($response,true);
            return $responseArray;
        }
        curl_close($curl);
    }
}