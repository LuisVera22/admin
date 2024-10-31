<?php
class Openssl
{
    static public function encriptar($param, $clave)
    {
        $method = 'aes-256-cbc';
        $ivLength = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivLength);

        $encriptado = openssl_encrypt($param, $method, $clave, 0, $iv);
        return base64_encode($iv . $encriptado);
    }

    static public function desencriptar($paramSecret, $clave)
    {
        $method = 'aes-256-cbc';
        $ivLength = openssl_cipher_iv_length($method);
        $textoEncriptado = base64_decode($paramSecret);
        $iv = substr($textoEncriptado, 0, $ivLength);
        $encriptado = substr($textoEncriptado, $ivLength);

        return openssl_decrypt($encriptado, $method, $clave, 0, $iv);
    }
}
