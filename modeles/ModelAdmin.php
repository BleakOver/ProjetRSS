<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 13/12/18
 * Time: 07:49
 */

class ModelAdmin
{
    public static function connection($loginAdmin, $password){
        global $base, $login, $mdp;

        $adminG=new AdminsGateway(new Connection($base, $login, $mdp));
        if($adminG->adminExists($loginAdmin, $password)){
            $_SESSION['role']='admin';
            $_SESSION['login']=$login;
        }
        else{
            throw new Exception("Admin inconnu");
        }
    }

    public static function deconnection(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public static function isAdmin(){
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            return($_SESSION['role'] == 'admin');
        }
        return false;
    }
}