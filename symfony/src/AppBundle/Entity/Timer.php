<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timer
 *
 * @ORM\Table(name="timer", indexes={@ORM\Index(name="fk_timer_task1_idx", columns={"task_id"}), @ORM\Index(name="fk_timer_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Timer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="last_time", type="integer", nullable=true)
     */
    private $lastTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_time", type="integer", nullable=true)
     */
    private $maxTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_round", type="integer", nullable=true)
     */
    private $lastRound;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_round", type="integer", nullable=true)
     */
    private $maxRound;

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
     * @ORM\Column(name="timer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $timerId;

    /**
     * @var \AppBundle\Entity\Task
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_id", referencedColumnName="task_id")
     * })
     */
    private $task;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set lastTime
     *
     * @param integer $lastTime
     *
     * @return Timer
     */
    public function setLastTime($lastTime)
    {
        $this->lastTime = $lastTime;

        return $this;
    }

    /**
     * Get lastTime
     *
     * @return integer
     */
    public function getLastTime()
    {
        return $this->lastTime;
    }

    /**
     * Set maxTime
     *
     * @param integer $maxTime
     *
     * @return Timer
     */
    public function setMaxTime($maxTime)
    {
        $this->maxTime = $maxTime;

        return $this;
    }

    /**
     * Get maxTime
     *
     * @return integer
     */
    public function getMaxTime()
    {
        return $this->maxTime;
    }

    /**
     * Set lastRound
     *
     * @param integer $lastRound
     *
     * @return Timer
     */
    public function setLastRound($lastRound)
    {
        $this->lastRound = $lastRound;

        return $this;
    }

    /**
     * Get lastRound
     *
     * @return integer
     */
    public function getLastRound()
    {
        return $this->lastRound;
    }

    /**
     * Set maxRound
     *
     * @param integer $maxRound
     *
     * @return Timer
     */
    public function setMaxRound($maxRound)
    {
        $this->maxRound = $maxRound;

        return $this;
    }

    /**
     * Get maxRound
     *
     * @return integer
     */
    public function getMaxRound()
    {
        return $this->maxRound;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Timer
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
     * @return Timer
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
     * @return Timer
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
     * Get timerId
     *
     * @return integer
     */
    public function getTimerId()
    {
        return $this->timerId;
    }

    /**
     * Set task
     *
     * @param \AppBundle\Entity\Task $task
     *
     * @return Timer
     */
    public function setTask(\AppBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \AppBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Timer
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
