<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoginHistory
 *
 * @ORM\Table(name="login_history", indexes={@ORM\Index(name="fk_login_history_users1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class LoginHistory
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_history_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $loginHistoryId;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return LoginHistory
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
     * Set loginHistoryId
     *
     * @param integer $loginHistoryId
     *
     * @return LoginHistory
     */
    public function setLoginHistoryId($loginHistoryId)
    {
        $this->loginHistoryId = $loginHistoryId;

        return $this;
    }

    /**
     * Get loginHistoryId
     *
     * @return integer
     */
    public function getLoginHistoryId()
    {
        return $this->loginHistoryId;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return LoginHistory
     */
    public function setUser(\AppBundle\Entity\Users $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }
}
