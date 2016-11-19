<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversation
 *
 * @ORM\Table(name="conversation")
 * @ORM\Entity
 */
class Conversation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="team_id", type="integer", nullable=false)
     */
    private $teamId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user1_id", type="integer", nullable=true)
     */
    private $user1Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user2_id", type="integer", nullable=true)
     */
    private $user2Id;

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
     * @ORM\Column(name="conversation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $conversationId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="conversationConversation")
     * @ORM\JoinTable(name="conversation_has_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="conversation_conversation_id", referencedColumnName="conversation_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_user_id", referencedColumnName="user_id")
     *   }
     * )
     */
    private $userUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userUser = new \Doctrine\Common\Collections\ArrayCollection();

        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Conversation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set teamId
     *
     * @param integer $teamId
     *
     * @return Conversation
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;

        return $this;
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
     * Set user1Id
     *
     * @param integer $user1Id
     *
     * @return Conversation
     */
    public function setUser1Id($user1Id)
    {
        $this->user1Id = $user1Id;

        return $this;
    }

    /**
     * Get user1Id
     *
     * @return integer
     */
    public function getUser1Id()
    {
        return $this->user1Id;
    }

    /**
     * Set user2Id
     *
     * @param integer $user2Id
     *
     * @return Conversation
     */
    public function setUser2Id($user2Id)
    {
        $this->user2Id = $user2Id;

        return $this;
    }

    /**
     * Get user2Id
     *
     * @return integer
     */
    public function getUser2Id()
    {
        return $this->user2Id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Conversation
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
     * @return Conversation
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
     * @return Conversation
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
     * Get conversationId
     *
     * @return integer
     */
    public function getConversationId()
    {
        return $this->conversationId;
    }

    /**
     * Add userUser
     *
     * @param \AppBundle\Entity\User $userUser
     *
     * @return Conversation
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
}
