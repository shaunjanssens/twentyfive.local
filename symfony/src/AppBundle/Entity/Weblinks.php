<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weblinks
 *
 * @ORM\Table(name="weblinks")
 * @ORM\Entity
 */
class Weblinks
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="weblink_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $weblinkId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Teams", mappedBy="weblink")
     */
    private $team;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->team = new \Doctrine\Common\Collections\ArrayCollection();

        $this->setCreatedAt(new \DateTime());

        if ($this->getUpdatedAt() == null) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateModifiedDatetime() {
        $this->setUpdatedAt(new \DateTime());
    }


    /**
     * Set url
     *
     * @param string $url
     *
     * @return Weblinks
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Weblinks
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
     * Get weblinkId
     *
     * @return integer
     */
    public function getWeblinkId()
    {
        return $this->weblinkId;
    }

    /**
     * Add team
     *
     * @param \AppBundle\Entity\Teams $team
     *
     * @return Weblinks
     */
    public function addTeam(\AppBundle\Entity\Teams $team)
    {
        $this->team[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \AppBundle\Entity\Teams $team
     */
    public function removeTeam(\AppBundle\Entity\Teams $team)
    {
        $this->team->removeElement($team);
    }

    /**
     * Get team
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeam()
    {
        return $this->team;
    }
}
