<?php
/**
 * Created by PhpStorm.
 * User: hadrien.chatelet
 * Date: 20/11/17
 * Time: 14:01
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Inventory
 * @ORM\Entity
 * @ORM\Table(name="inventory")
 */
class Inventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="inventories")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;
    /**
     * @ORM\Column(type="decimal", name="number_of_item")
     */
    private $numberOfItem;

    public function __construct()
    {
        $this->inventories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getInventories()
    {
        return $this->inventories;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $inventories
     */
    public function setInventories($inventories)
    {
        $this->inventories = $inventories;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return mixed
     */
    public function getNumberOfItem()
    {
        return $this->numberOfItem;
    }

    /**
     * @param mixed $numberOfItem
     */
    public function setNumberOfItem($numberOfItem)
    {
        $this->numberOfItem = $numberOfItem;
    }


}