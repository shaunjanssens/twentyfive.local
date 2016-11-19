<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timers
 *
 * @ORM\Table(name="timers", indexes={@ORM\Index(name="fk_timers_tasks1_idx", columns={"tasks_task_id"})})
 * @ORM\Entity
 */
class Timers
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
     * @var integer
     *
     * @ORM\Column(name="timer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $timerId;

    /**
     * @var \AppBundle\Entity\Tasks
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tasks_task_id", referencedColumnName="task_id")
     * })
     */
    private $tasksTask;

    /**
     * Set lastTime
     *
     * @param integer $lastTime
     *
     * @return Timers
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
     * @return Timers
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
     * @return Timers
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
     * @return Timers
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
     * Get timerId
     *
     * @return integer
     */
    public function getTimerId()
    {
        return $this->timerId;
    }

    /**
     * Set tasksTask
     *
     * @param \AppBundle\Entity\Tasks $tasksTask
     *
     * @return Timers
     */
    public function setTasksTask(\AppBundle\Entity\Tasks $tasksTask = null)
    {
        $this->tasksTask = $tasksTask;

        return $this;
    }

    /**
     * Get tasksTask
     *
     * @return \AppBundle\Entity\Tasks
     */
    public function getTasksTask()
    {
        return $this->tasksTask;
    }
}
