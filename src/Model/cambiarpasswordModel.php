<?php
session_start();
require '../../config/enviroment.php';

class CambiarpasswordModel
{
    static public function getCambiarpassword($correo,$password)
    {
        $arrayResponse = array(
            'email'     => $correo,
            'password'  => $password,
            'fecha'     => date('Y-m-d H:i:s')
        );

        $curl = curl_init();
        $url = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . 'changepassword',
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
                'Accept: application/json'
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