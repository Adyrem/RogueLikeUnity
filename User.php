<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 30.10.2018
 * Time: 16:06
 */

class User
{
    public $name;
    public $beerConsumed;
    public $beerPaid;
    public $beerFactor;

    /**
     * User constructor.
     * @param $name
     * @param $beerConsumed
     * @param $beerPaid
     */
    public function __construct($name, $beerConsumed, $beerPaid)
    {
        $this->name = $name;
        $this->beerConsumed = $beerConsumed;
        $this->beerPaid = $beerPaid;
        if($beerPaid != 0) {
            $this->beerFactor = $this->beerConsumed / $this->beerPaid;
        } else {
            $this->beerFactor = $this->beerConsumed;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBeerConsumed()
    {
        return $this->beerConsumed;
    }

    /**
     * @param mixed $beerConsumed
     */
    public function setBeerConsumed($beerConsumed)
    {
        $this->beerConsumed = $beerConsumed;
    }

    /**
     * @return mixed
     */
    public function getBeerPaid()
    {
        return $this->beerPaid;
    }

    /**
     * @param mixed $beerPaid
     */
    public function setBeerPaid($beerPaid)
    {
        $this->beerPaid = $beerPaid;
    }




}