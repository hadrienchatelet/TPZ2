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
     * @ORM\ManyToOne(targetEntity="Material")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    private $material;
    /**
     * @ORM\Column(type="decimal", name="number_of_item")
     */
    private $numberOfItem;

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

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }


}