<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TeamConfig
 *
 * @ORM\Table(name="team_config", indexes={@ORM\Index(name="fk_customization_team1_idx", columns={"team_id"})})
 * @ORM\Entity
 */
class TeamConfig
{
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=6, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var integer
     *
     * @ORM\Column(name="team_config_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $teamConfigId;

    /**
     * @var \AppBundle\Entity\Team
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_id", referencedColumnName="team_id")
     * })
     */
    private $team;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return TeamConfig
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
     * Set logo
     *
     * @param string $logo
     *
     * @return TeamConfig
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Get teamConfigId
     *
     * @return integer
     */
    public function getTeamConfigId()
    {
        return $this->teamConfigId;
    }

    /**
     * Set team
     *
     * @param \AppBundle\Entity\Team $team
     *
     * @return TeamConfig
     */
    public function setTeam(\AppBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \AppBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }
}
