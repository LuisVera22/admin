<?php
require_once 'config/enviroment.php';

$curl = curl_init();
$url = $_ENV['URL'];
curl_setopt_array($curl, array(
    CURLOPT_URL => $url . 'auth/logout',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
    ),
));
$err = curl_error($curl);
if ($err) {
    echo "<script>Swal.fire('Error!', 'se perdió la conexión con el servidor', 'error');</script>";
} else {
    $response = curl_exec($curl);
    $responseArray = json_decode($response, true);
    if (isset($responseArray['status']) && $responseArray['status']) {
        session_destroy();
        echo '<script>
                window.location.replace("login");
                localStorage.clear();
                sessionStorage.clear();
            </script>';
        exit();
    } else {
        session_destroy();
        echo '<script>
                window.location.replace("login");
                localStorage.clear();
                sessionStorage.clear();
            </script>';
        exit();
    }
}
