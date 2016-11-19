<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity
 */
class Roles
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=true)
     */
    private $name;

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="roles_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rolesId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Roles
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get rolesId
     *
     * @return integer
     */
    public function getRolesId()
    {
        return $this->rolesId;
    }
}
