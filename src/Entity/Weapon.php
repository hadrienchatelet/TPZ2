<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
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
    private $damageDistanceCoef;
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
    public function __construct($name, $damage, $damageDistanceCoef, $fireRate)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->damageDistanceCoef = $damageDistanceCoef;
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
    public function getDamageDistanceCoef()
    {
        return $this->damageDistanceCoef;
    }

    /**
     * @return mixed
     */
    public function getFireRate()
    {
        return $this->fireRate;
    }



}