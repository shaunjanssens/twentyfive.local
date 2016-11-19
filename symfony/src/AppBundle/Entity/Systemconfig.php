<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Systemconfig
 *
 * @ORM\Table(name="systemconfig")
 * @ORM\Entity
 */
class Systemconfig
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name = 'Twentyfive';

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=6, nullable=false)
     */
    private $color = 'EA4242';

    /**
     * @var string
     *
     * @ORM\Column(name="app_name", type="string", length=32, nullable=false)
     */
    private $appName = 'twentyfive';

    /**
     * @var integer
     *
     * @ORM\Column(name="systemconfig_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $systemconfigId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Systemconfig
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
     * Set color
     *
     * @param string $color
     *
     * @return Systemconfig
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set appName
     *
     * @param string $appName
     *
     * @return Systemconfig
     */
    public function setAppName($appName)
    {
        $this->appName = $appName;

        return $this;
    }

    /**
     * Get appName
     *
     * @return string
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * Get systemconfigId
     *
     * @return integer
     */
    public function getSystemconfigId()
    {
        return $this->systemconfigId;
    }
}
