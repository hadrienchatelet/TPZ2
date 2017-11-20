<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:08
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    private $name;
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="max_weight")
     */
    private $maxWeight;
    /**
     * @ORM\OneToMany(targetEntity="Inventory", mappedBy="person")
     */
    private $inventories;

    public function __construct()
    {
        $this->inventories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    function __toString()
    {
        return $this->getName();
    }


    /**
     * @return mixed
     */
    public function getInventories()
    {
        return $this->inventories;
    }

    /**
     * @param mixed $inventories
     */
    public function setInventories($inventories)
    {
        $this->inventories = $inventories;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * @param int $maxWeight
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }


}