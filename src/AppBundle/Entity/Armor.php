<?php

namespace Yami\TeamBuilder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Armor
 *
 * @ORM\Entity()
 */
class Armor
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "The name must be at least {{ limit }} characters long",
     *      maxMessage = "The name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @var Archetype
     *
     * @ORM\ManyToOne(targetEntity="Yami\TeamBuilder\AppBundle\Entity\Archetype", inversedBy="armor")
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
     *      maxMessage = "The level can't be greater than 6"
     * )
     */
    private $level;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $description;

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
    public function setId($id)
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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Archetype
     */
    public function getArchetype()
    {
        return $this->archetype;
    }

    /**
     * @param Archetype $archetype
     */
    public function setArchetype($archetype)
    {
        $this->archetype = $archetype;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}