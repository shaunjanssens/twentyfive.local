<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversations
 *
 * @ORM\Table(name="conversations", indexes={@ORM\Index(name="fk_conversations_teams1_idx", columns={"team_id"})})
 * @ORM\Entity
 */
class Conversations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="conversation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $conversationId;

    /**
     * @var \AppBundle\Entity\Teams
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_id", referencedColumnName="team_id")
     * })
     */
    private $team;



    /**
     * Set conversationId
     *
     * @param integer $conversationId
     *
     * @return Conversations
     */
    public function setConversationId($conversationId)
    {
        $this->conversationId = $conversationId;

        return $this;
    }

    /**
     * Get conversationId
     *
     * @return integer
     */
    public function getConversationId()
    {
        return $this->conversationId;
    }

    /**
     * Set team
     *
     * @param \AppBundle\Entity\Teams $team
     *
     * @return Conversations
     */
    public function setTeam(\AppBundle\Entity\Teams $team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \AppBundle\Entity\Teams
     */
    public function getTeam()
    {
        return $this->team;
    }
}
