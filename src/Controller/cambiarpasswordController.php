<?php
class CambiarpasswordController
{
    static public function cambiarPassword($correo,$password) 
    {
        return CambiarpasswordRepository::cambiarPassword($correo,$password);
    }
}
