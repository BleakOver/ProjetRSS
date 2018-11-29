<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 22/11/18
 * Time: 08:07
 */

class News
{
    private $address;
    private $desc;

    public function __construct($address, $desc)
    {
        $this->address=$address;
        $this->desc=$desc;
    }

    public function getAdress(){
        return $this->address;
    }

    public function getDescription(){
        return $this->Description;
    }
}