<?php
require_once '../../src/Interface/loginInterface.php';
require_once '../../src/Model/loginModel.php';

class LoginRepository implements LoginInterface{
    static public function authenticate($user,$password){
        $modeloLogin = new LoginModel($user,$password);
        return $modeloLogin->postLogin();
    }
}
?>
