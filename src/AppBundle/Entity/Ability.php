<?php

namespace Yami\TeamBuilder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Ability
 *
 * @ORM\Entity
 */
class Ability
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
     * @ORM\ManyToOne(targetEntity="Yami\TeamBuilder\AppBundle\Entity\Archetype", inversedBy="abilities")
     * @Assert\NotNull()
     * @Assert\Type("Yami\TeamBuilder\AppBundle\Entity\Archetype")
     */
    private $archetype;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "The name must be at least {{ limit }} characters long",
     *      maxMessage = "The name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(type="simple_array", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("array")
     * @Assert\Count(
     *      min = "1",
     *      max = "4",
     *      minMessage = "You must specify at least one cast position",
     *      maxMessage = "You can't have more than 4 cast positions"
     * )
     */
    private $castPositions;

    /**
     * @var array
     *
     * @ORM\Column(type="simple_array", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("array")
     * @Assert\Count(
     *      min = "1",
     *      max = "4",
     *      minMessage = "You must specify at least one target position",
     *      maxMessage = "You can't have more than 4 target positions"
     * )
     */
    private $targetPositions;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $description;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getCastPositions()
    {
        return $this->castPositions;
    }

    /**
     * @return array
     */
    public function getTargetPositions()
    {
        return $this->targetPositions;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param Archetype $archetype
     */
    public function setArchetype($archetype)
    {
        $this->archetype = $archetype;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param array $castPositions
     */
    public function setCastPositions($castPositions)
    {
        $this->castPositions = $castPositions;
    }

    /**
     * @param array $targetPositions
     */
    public function setTargetPositions($targetPositions)
    {
        $this->targetPositions = $targetPositions;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}