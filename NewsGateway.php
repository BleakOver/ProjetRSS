<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 22/11/18
 * Time: 08:16
 */
require_once 'Connection.php';

class NewsGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function findAll(): array {
        $query='SELECT * FROM NEWS';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    public function findByAddress($address): array {
        $query='SELECT * FROM NEWS WHERE ADRESSE=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR)
            )
        );
        return $this->con->getResults();
    }

    public function insert($address, $description){
        $query='INSERT INTO NEWS VALUES(:address, :des)';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR),
            ':des' => array($description, PDO::PARAM_STR)
            )
        );
    }

    public function delete($address){
        $query='DELETE FROM NEWS WHERE ADRESSE=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR)
            )
        );
    }

    public function update($address, $newDescription){
        $query='UPDATE NEWS SET DESCRIPTION=:des WHERE ADRESSE=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR),
            ':des' => array($newDescription, PDO::PARAM_STR)
            )
        );
    }


}