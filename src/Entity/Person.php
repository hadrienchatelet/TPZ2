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
     * @ORM\Column(type="integer")
     */
    private $age;
    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $visible;
    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    private $color;

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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->visible;
    }

    /**
     * @param bool $visible
     */
    public function setVisible(bool $visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }



    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}