<?php

namespace App\Entity;

/**
 * Class Player
 * @ORM\Entity
 */
class Player
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
    private $healthpoint = 100;
    /**
     * @ORM\ManyToOne(targetEntity="Weapon")
     */
    private $currentWeapon;

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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getHealthpoint()
    {
        return $this->healthpoint;
    }

    /**
     * @param mixed $healthpoint
     */
    public function setHealthpoint($healthpoint)
    {
        $this->healthpoint = $healthpoint;
    }

    /**
     * @return mixed
     */
    public function getCurrentWeapon()
    {
        return $this->currentWeapon;
    }

    /**
     * @param mixed $currentWeapon
     */
    public function setCurrentWeapon($currentWeapon)
    {
        $this->currentWeapon = $currentWeapon;
    }


}