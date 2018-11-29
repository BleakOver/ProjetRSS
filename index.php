<?php
    require_once 'Connection.php';
    require_once 'SiteGateway.php';
    $bd=new Connection('mysql:host=berlin.iut.local;dbname=dbenmora','enmora','enmora');

    $site_gw=new SiteGateway($bd);

    $site_gw->delete('http://testpourvoirsicamarche.fr/');


    $results=$site_gw->findByAddress('https://www.lefigaro.fr/');
    foreach ($results as $row){
        echo $row[0]."</br>";
        echo $row[1]."</br></br>";
    }
    /*
    $query='INSERT INTO SITE VALUES(:address, :des);';
    $address='https://www.lefigaro.fr/';
    $desc='site de news';
    $bd->executeQuery($query, array(
        ':address' => array($address, PDO::PARAM_STR),
        ':des' => array($desc, PDO::PARAM_STR)
    ));
    */


    /*
    $query='SELECT * FROM SITE';
    $bd->executeQuery($query);
    $results=$bd->getResults();
    foreach ($results as $row){
        echo $row[0]."</br>";
        echo $row[1]."</br></br>";
    }
    */
