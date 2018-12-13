<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 13/12/18
 * Time: 08:03
 */

class AdminsGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function adminExists($login, $mdp){
        $query='SELECT * FROM ADMINS WHERE LOGIN=:login AND PASSWORD=:password';
        $this->con->executeQuery($query, array(
                ':login' => array($login, PDO::PARAM_STR),
                ':password' => array($mdp, PDO::PARAM_STR)
            )
        );
        $results=$this->con->getResults();
        return ($results != null);
    }
}