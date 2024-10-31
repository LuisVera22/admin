<?php
require '../../config/enviroment.php';

class LoginModel
{
    private $user;
    private $password;

    function __construct($user, $password)
    {
        $this->user     = $user;
        $this->password = $password;
    }

    public function postLogin()
    {
        $array = array(
            "username"  => $this->user,
            "password"  => $this->password
        );

        $curl = curl_init();
        $url = $_ENV['URL'];
        curl_setopt_array($curl, array(
            CURLOPT_URL             => $url . "auth/login",
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_POSTFIELDS      => json_encode($array),
            CURLOPT_HTTPHEADER      => array(
                "cache-control: no-cache",
                "content-type: application/json"
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