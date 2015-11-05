<?php

namespace Yami\TeamBuilder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotNull()
     * @Assert\Type("Yami\TeamBuilder\AppBundle\Entity\Archetype")
     */
    private $archetype;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 6,
     *      minMessage = "The level should be at least 1",
     *      maxMessage = "The level can't be greater than 5"
     * )
     */
    private $level;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The health value should be at least 10",
     *      maxMessage = "The health value can't be greater than 100"
     * )
     */
    private $health;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 80,
     *      minMessage = "The dodge should be at least 1",
     *      maxMessage = "The dodge can't be greater than 80"
     * )
     */
    private $dodge;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      minMessage = "The speed should be at least 1",
     *      maxMessage = "The speed can't be greater than 80"
     * )
     */
    private $speed;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 15,
     *      minMessage = "The critical should be at least 1",
     *      maxMessage = "The critical can't be greater than 15"
     * )
     */
    private $critical;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 40,
     *      minMessage = "The min damage should be at least 1",
     *      maxMessage = "The min damage can't be greater than 15"
     * )
     */
    private $minDamages;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 15,
     *      minMessage = "The max damage should be at least 1",
     *      maxMessage = "The max damage can't be greater than 15"
     * )
     */
    private $maxDamages;

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
     * @return int
     */
    public function getMaxDamages()
    {
        return $this->maxDamages;
    }

    /**
     * @return int
     */
    public function getMinDamages()
    {
        return $this->minDamages;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param Archetype $archetype
     */
    public function setArchetype($archetype)
    {
        $this->archetype = $archetype;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @param int $dodge
     */
    public function setDodge($dodge)
    {
        $this->dodge = $dodge;
    }

    /**
     * @param int $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @param float $critical
     */
    public function setCritical($critical)
    {
        $this->critical = $critical;
    }

    /**
     * @param int $maxDamage
     */
    public function setMaxDamages($maxDamages)
    {
        $this->maxDamages = $maxDamages;
    }

    /**
     * @param int $minDamage
     */
    public function setMinDamages($minDamages)
    {
        $this->minDamages = $minDamages;
    }


}