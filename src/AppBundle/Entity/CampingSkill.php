<?php

namespace Yami\TeamBuilder\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CampingSkill
 *
 * @ORM\Entity
 */
class CampingSkill
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
     * @var Archetype|null
     *
     * @ORM\ManyToOne(targetEntity="Yami\TeamBuilder\AppBundle\Entity\Archetype", inversedBy="campingSkills")
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
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      minMessage = "The time cost should be at least 1",
     *      maxMessage = "The time cost can't be greater than 5"
     * )
     */
    private $timeCost;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Regex(
     *      pattern = "/self|one|all/",
     *      message = "Invalid target"
     * )
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $description;

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
     * @return int
     */
    public function getTimeCost()
    {
        return $this->timeCost;
    }

    /**
     * @param int $timeCost
     */
    public function setTimeCost($timeCost)
    {
        $this->timeCost = $timeCost;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
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