<?php

/**
 * Version 1.0
 * Created by Flavio Lang on 30.10.2018
 *
 * Version 1.1
 * Edited by Flavio Lang on 27.11.2018
 */

/**
 * This class represents a single user.
 * All the data of one particular user is stored here during runtime.
 */

class User
{
    /**
     * @var $name           The name of the user.
     * @var $beerConsumed   The amount of beer consumed by the user.
     * @var $beerPaid       The amount of beer paid by the user.
     * @var $beerFactor     The ratio between paid and consumed beers. This value is used to determine the user
     *                      that pays the next round of beers. (beerConsumed / beerPaid)
     */
    public $name;
    public $beerConsumed;
    public $beerPaid;
    public $beerFactor;

    /**
     * User constructor.
     * @param $name             The name of the user.
     * @param $beerConsumed     The amount of beers consumed by the user.
     * @param $beerPaid         The amount of beers paid by the user.
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBeerConsumed()
    {
        return $this->beerConsumed;
    }

    public function setBeerConsumed($beerConsumed)
    {
        $this->beerConsumed = $beerConsumed;
    }

    public function getBeerPaid()
    {
        return $this->beerPaid;
    }

    public function setBeerPaid($beerPaid)
    {
        $this->beerPaid = $beerPaid;
    }




}