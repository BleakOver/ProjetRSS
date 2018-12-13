<?php

class FrontControl
{
    function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        session_start();
        $dVueErreur = array();

        $listeAction_Admin = array('ajout', 'flux', 'delete');

        try {
            $action = $_REQUEST['action'];

            if (in_array($action, $listeAction_Admin)) {
                if (ModelAdmin::isAdmin()) {
                    new AdminControl();
                } else {
                    $_REQUEST['action'] = 'connection';
                    new UserControl();
                }
            } else {
                new UserControl();
            }
        }catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue PDO!!! ";
            $dVueEreur[] =	$e->getMessage();
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            $dVueEreur[] =	$e2->getMessage();
            require ($rep.$vues['erreur']);
        }

        //fin
        exit(0);
    }
}