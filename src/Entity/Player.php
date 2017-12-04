<?php
/**
 * Created by PhpStorm.
 * User: hadrienchatelet
 * Date: 13/11/2017
 * Time: 14:08
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Player
 * @ORM\Entity
 * @ORM\Table(name="player")
 * @UniqueEntity("name")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     * min = 4,
     * max = 20,
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
 *     )
     * @ORM\Column(type="string", length=40)
     */
    private $name;
    /**
     * @Assert\NotBlank()
     * @Assert\Choice({"ADC", "JUNG", "TOP", "MID", "SUP"})
     * @ORM\Column(type="string")
     */
    private $role;

    function __toString()
    {
        return $this->getName();
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
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
}