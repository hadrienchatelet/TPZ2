<?php

namespace App\Entity;

/**
 * Class Weapon
 * @ORM\Entity
 */
class Weapon
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column()
     */
    private $name;
    /**
     * @ORM\Column(type="integer")
     */
    private $damage;
    /**
     * @ORM\Column(type="decimal")
     */
    private $damageDistanceCoeff;
    /**
     * @ORM\Column(type="integer")
     */
    private $fireRate;

    /**
     * Weapon constructor.
     * @param $name
     * @param $damage
     * @param $damageDistanceCoeff
     * @param $fireRate
     */
    public function __construct($name, $damage, $damageDistanceCoeff, $fireRate)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->damageDistanceCoeff = $damageDistanceCoeff;
        $this->fireRate = $fireRate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return mixed
     */
    public function getDamageDistanceCoeff()
    {
        return $this->damageDistanceCoeff;
    }

    /**
     * @return mixed
     */
    public function getFireRate()
    {
        return $this->fireRate;
    }



}