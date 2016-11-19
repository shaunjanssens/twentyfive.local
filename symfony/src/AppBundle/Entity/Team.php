<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team", indexes={@ORM\Index(name="fk_team_organisation1_idx", columns={"organisation_id"})})
 * @ORM\Entity
 */
class Team
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
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
     * @var \AppBundle\Entity\Organisation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisation_id", referencedColumnName="organisation_id")
     * })
     */
    private $organisation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="teamTeam")
     * @ORM\JoinTable(name="team_has_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="team_team_id", referencedColumnName="team_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_user_id", referencedColumnName="user_id")
     *   }
     * )
     */
    private $userUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Weblink", inversedBy="teamTeam")
     * @ORM\JoinTable(name="team_has_weblink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="team_team_id", referencedColumnName="team_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="weblink_weblink_id", referencedColumnName="weblink_id")
     *   }
     * )
     */
    private $weblinkWeblink;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userUser = new \Doctrine\Common\Collections\ArrayCollection();
        $this->weblinkWeblink = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Team
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
     * Set description
     *
     * @param string $description
     *
     * @return Team
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Team
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
     * @return Team
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
     * @return Team
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
     * @param \AppBundle\Entity\Organisation $organisation
     *
     * @return Team
     */
    public function setOrganisation(\AppBundle\Entity\Organisation $organisation = null)
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Get organisation
     *
     * @return \AppBundle\Entity\Organisation
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Add userUser
     *
     * @param \AppBundle\Entity\User $userUser
     *
     * @return Team
     */
    public function addUserUser(\AppBundle\Entity\User $userUser)
    {
        $this->userUser[] = $userUser;

        return $this;
    }

    /**
     * Remove userUser
     *
     * @param \AppBundle\Entity\User $userUser
     */
    public function removeUserUser(\AppBundle\Entity\User $userUser)
    {
        $this->userUser->removeElement($userUser);
    }

    /**
     * Get userUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserUser()
    {
        return $this->userUser;
    }

    /**
     * Add weblinkWeblink
     *
     * @param \AppBundle\Entity\Weblink $weblinkWeblink
     *
     * @return Team
     */
    public function addWeblinkWeblink(\AppBundle\Entity\Weblink $weblinkWeblink)
    {
        $this->weblinkWeblink[] = $weblinkWeblink;

        return $this;
    }

    /**
     * Remove weblinkWeblink
     *
     * @param \AppBundle\Entity\Weblink $weblinkWeblink
     */
    public function removeWeblinkWeblink(\AppBundle\Entity\Weblink $weblinkWeblink)
    {
        $this->weblinkWeblink->removeElement($weblinkWeblink);
    }

    /**
     * Get weblinkWeblink
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeblinkWeblink()
    {
        return $this->weblinkWeblink;
    }
}
