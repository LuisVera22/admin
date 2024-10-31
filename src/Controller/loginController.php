<?php
class LoginController{
    static public function authenticate($user,$password){
        return LoginRepository::authenticate($user,$password);
    }
}
?>