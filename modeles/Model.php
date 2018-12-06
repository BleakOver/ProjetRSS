<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 06/12/18
 * Time: 09:46
 */

class Model
{
    public static function getNewsAtPage($page){
        global $base, $login, $mdp;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        return $news->findAtPage($page);
    }

    public static function addFlux($url){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        try {
            $fluxG->insert(new Flux($url));
        }
        catch (PDOException $e){
        }
    }

    public static function delFlux($url){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        $fluxG->delete($url);
        //require ($rep."/index.php"); soit header (Location index.php);
    }

    public static function getFlux(){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        return $fluxG->findAll();
    }
}