<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teams
 *
 * @ORM\Table(name="teams", indexes={@ORM\Index(name="fk_teams_organisations1_idx", columns={"organisation_id"})})
 * @ORM\Entity
 */
class Teams
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=6, nullable=true)
     */
    private $color;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="team_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $teamId;

    /**
     * @var \AppBundle\Entity\Organisations
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Organisations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisation_id", referencedColumnName="organisation_id")
     * })
     */
    private $organisation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Users", inversedBy="team")
     * @ORM\JoinTable(name="teams_has_users",
     *   joinColumns={
     *     @ORM\JoinColumn(name="team_id", referencedColumnName="team_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     *   }
     * )
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Weblinks", inversedBy="team")
     * @ORM\JoinTable(name="teams_has_weblinks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="team_id", referencedColumnName="team_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="weblink_id", referencedColumnName="weblink_id")
     *   }
     * )
     */
    private $weblink;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->weblink = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set name
     *
     * @param string $name
     *
     * @return Teams
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
     * @return Teams
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Teams
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Teams
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Teams
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Get teamId
     *
     * @return integer
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Set organisation
     *
     * @param \AppBundle\Entity\Organisations $organisation
     *
     * @return Teams
     */
    public function setOrganisation(\AppBundle\Entity\Organisations $organisation = null)
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Get organisation
     *
     * @return \AppBundle\Entity\Organisations
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Teams
     */
    public function addUser(\AppBundle\Entity\Users $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\Users $user
     */
    public function removeUser(\AppBundle\Entity\Users $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add weblink
     *
     * @param \AppBundle\Entity\Weblinks $weblink
     *
     * @return Teams
     */
    public function addWeblink(\AppBundle\Entity\Weblinks $weblink)
    {
        $this->weblink[] = $weblink;

        return $this;
    }

    /**
     * Remove weblink
     *
     * @param \AppBundle\Entity\Weblinks $weblink
     */
    public function removeWeblink(\AppBundle\Entity\Weblinks $weblink)
    {
        $this->weblink->removeElement($weblink);
    }

    /**
     * Get weblink
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeblink()
    {
        return $this->weblink;
    }
}
