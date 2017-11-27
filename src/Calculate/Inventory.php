<?php

namespace App\Calculate;


class Inventory
{
    private $em;
    private $myParameter;
    private $person;
    private $inventory;
    /**
     * Inventory constructor.
     */
    public function __construct(\Doctrine\ORM\EntityManagerInterface $em, $myParameter){
        $this->em = $em;
        $this->myParameter = $myParameter;
    }

    public function calcul(){
        $totalWeight = 0.0;
        foreach ($this->person->getInventories() as $inventory)
        {
            $totalWeight = $inventory->getNumberOfItem() * $inventory->getMaterial()->getWeight();
        }
        $totalWeight += $this->inventory->getNumberOfItem() * $this->inventory->getMaterial()->getWeight();
        if ($this->person->getMaxWeight() < $totalWeight)
            return false;
        return true;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @param mixed $inventories
     */
    public function setInventories($inventories)
    {
        $this->inventories = $inventories;
    }


}