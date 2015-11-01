<?php

namespace Yami\TeamBuilder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Archetype
 *
 * @ORM\Entity
 */
class Archetype
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
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "The name must be at least {{ limit }} characters long",
     *      maxMessage = "The name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @var Ability[]
     *
     * @ORM\OneToMany(targetEntity="Yami\TeamBuilder\AppBundle\Entity\Ability", mappedBy="archetype")
     */
    private $abilities;

    /**
     * @var CampingSkill[]
     *
     * @ORM\OneToMany(targetEntity="Yami\TeamBuilder\AppBundle\Entity\CampingSkill", mappedBy="archetype")
     */
    private $campingSkills;

    /**
     * @var Attributes[]
     *
     * @ORM\OneToMany(targetEntity="Yami\TeamBuilder\AppBundle\Entity\Attributes", mappedBy="archetype")
     */
    private $attributes;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $stun;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $blight;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $disease;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $deathBlow;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $move;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $bleed;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $debuff;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false)
     * @Assert\NotNull()
     * @Assert\Range(
     *      min = 10,
     *      max = 100,
     *      minMessage = "The stun value should be at least 10",
     *      maxMessage = "The stun value can't be greater than 100"
     * )
     */
    private $trap;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Ability[]
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * @return CampingSkill[]
     */
    public function getCampingSkills()
    {
        return $this->campingSkills;
    }

    /**
     * @return Attributes[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return int
     */
    public function getStun()
    {
        return $this->stun;
    }

    /**
     * @return int
     */
    public function getBlight()
    {
        return $this->blight;
    }

    /**
     * @return int
     */
    public function getDisease()
    {
        return $this->disease;
    }

    /**
     * @return int
     */
    public function getDeathBlow()
    {
        return $this->deathBlow;
    }

    /**
     * @return int
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * @return int
     */
    public function getBleed()
    {
        return $this->bleed;
    }

    /**
     * @return int
     */
    public function getDebuff()
    {
        return $this->debuff;
    }

    /**
     * @return int
     */
    public function getTrap()
    {
        return $this->trap;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param int $stun
     */
    public function setStun($stun)
    {
        $this->stun = $stun;
    }

    /**
     * @param int $blight
     */
    public function setBlight($blight)
    {
        $this->blight = $blight;
    }

    /**
     * @param int $disease
     */
    public function setDisease($disease)
    {
        $this->disease = $disease;
    }

    /**
     * @param int $deathBlow
     */
    public function setDeathBlow($deathBlow)
    {
        $this->deathBlow = $deathBlow;
    }

    /**
     * @param int $move
     */
    public function setMove($move)
    {
        $this->move = $move;
    }

    /**
     * @param int $bleed
     */
    public function setBleed($bleed)
    {
        $this->bleed = $bleed;
    }

    /**
     * @param int $debuff
     */
    public function setDebuff($debuff)
    {
        $this->debuff = $debuff;
    }

    /**
     * @param int $trap
     */
    public function setTrap($trap)
    {
        $this->trap = $trap;
    }


}