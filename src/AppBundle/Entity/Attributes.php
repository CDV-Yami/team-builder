<?php

namespace Yami\TeamBuilder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Attributes
 *
 * @ORM\Entity
 */
class Attributes
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Archetype
     *
     * @ORM\ManyToOne(targetEntity="Yami\TeamBuilder\AppBundle\Entity\Archetype", inversedBy="attributes")
     */
    private $archetype;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $level;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $health;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $dodge;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $speed;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $critical;

    /**
     * @var array
     *
     * @ORM\Column(type="simple_array", nullable=false)
     */
    private $damages;

    public function __construct(Archetype $archetype, $level, $health, $dodge, $speed, $critical, array $damages)
    {
        $this->archetype = $archetype;
        $this->level = $level;
        $this->health = $health;
        $this->dodge = $dodge;
        $this->speed = $speed;
        $this->critical = $critical;
        $this->damages = $damages;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Archetype
     */
    public function getArchetype()
    {
        return $this->archetype;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getDodge()
    {
        return $this->dodge;
    }

    /**
     * @return int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getCritical()
    {
        return $this->critical;
    }

    /**
     * @return array
     */
    public function getDamages()
    {
        return $this->damages;
    }

}