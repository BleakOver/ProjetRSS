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

    public static function getNbPagesNews(){
        global $base, $login, $mdp, $nbParPage;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        return (int)$news->getNbNews()/$nbParPage;
    }

    public static function addNews($newsAInserer){
        global $base, $login, $mdp;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        $news->insert($newsAInserer);
    }
    public static function delAllNews(){
        global $base, $login, $mdp;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        $news->deleteAll();
    }

    public static function addFlux($url){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        $fluxG->insert(new Flux($url));
    }

    public static function delFlux($url){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        $fluxG->delete($url);
    }


    public static function getFlux(){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        return $fluxG->findAll();
    }
}