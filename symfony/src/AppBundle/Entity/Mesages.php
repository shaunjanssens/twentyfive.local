<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesages
 *
 * @ORM\Table(name="mesages", indexes={@ORM\Index(name="fk_mesages_users1_idx", columns={"users_id"}), @ORM\Index(name="fk_mesages_conversations1_idx", columns={"conversations_conversation_id", "conversations_team_id"})})
 * @ORM\Entity
 */
class Mesages
{
    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=true)
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="message_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $messageId;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="user_id")
     * })
     */
    private $users;

    /**
     * @var \AppBundle\Entity\Conversations
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Conversations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conversations_conversation_id", referencedColumnName="conversation_id"),
     *   @ORM\JoinColumn(name="conversations_team_id", referencedColumnName="team_id")
     * })
     */
    private $conversationsConversation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Mesages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set messageId
     *
     * @param integer $messageId
     *
     * @return Mesages
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * Get messageId
     *
     * @return integer
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\Users $users
     *
     * @return Mesages
     */
    public function setUsers(\AppBundle\Entity\Users $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set conversationsConversation
     *
     * @param \AppBundle\Entity\Conversations $conversationsConversation
     *
     * @return Mesages
     */
    public function setConversationsConversation(\AppBundle\Entity\Conversations $conversationsConversation = null)
    {
        $this->conversationsConversation = $conversationsConversation;

        return $this;
    }

    /**
     * Get conversationsConversation
     *
     * @return \AppBundle\Entity\Conversations
     */
    public function getConversationsConversation()
    {
        return $this->conversationsConversation;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
