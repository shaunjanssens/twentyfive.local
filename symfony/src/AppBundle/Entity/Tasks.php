<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tasks
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="fk_tasks_task_status1_idx", columns={"task_status_id"}), @ORM\Index(name="fk_tasks_task_categories1_idx", columns={"task_category_id"}), @ORM\Index(name="fk_tasks_users1_idx", columns={"user_id"}), @ORM\Index(name="fk_tasks_teams1_idx", columns={"team_id"})})
 * @ORM\Entity
 */
class Tasks
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
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
     * @ORM\Column(name="deadline", type="datetime", nullable=true)
     */
    private $deadline;

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
     * @ORM\Column(name="task_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taskId;

    /**
     * @var \AppBundle\Entity\TaskCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_category_id", referencedColumnName="task_category_id")
     * })
     */
    private $taskCategory;

    /**
     * @var \AppBundle\Entity\TaskStatus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TaskStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_status_id", referencedColumnName="task_status_id")
     * })
     */
    private $taskStatus;

    /**
     * @var \AppBundle\Entity\Teams
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Teams")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_id", referencedColumnName="team_id")
     * })
     */
    private $team;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
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
     * @return Tasks
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
     * @return Tasks
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
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Tasks
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Tasks
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
     * @return Tasks
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
     * @return Tasks
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
     * Get taskId
     *
     * @return integer
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * Set taskCategory
     *
     * @param \AppBundle\Entity\TaskCategories $taskCategory
     *
     * @return Tasks
     */
    public function setTaskCategory(\AppBundle\Entity\TaskCategories $taskCategory = null)
    {
        $this->taskCategory = $taskCategory;

        return $this;
    }

    /**
     * Get taskCategory
     *
     * @return \AppBundle\Entity\TaskCategories
     */
    public function getTaskCategory()
    {
        return $this->taskCategory;
    }

    /**
     * Set taskStatus
     *
     * @param \AppBundle\Entity\TaskStatus $taskStatus
     *
     * @return Tasks
     */
    public function setTaskStatus(\AppBundle\Entity\TaskStatus $taskStatus = null)
    {
        $this->taskStatus = $taskStatus;

        return $this;
    }

    /**
     * Get taskStatus
     *
     * @return \AppBundle\Entity\TaskStatus
     */
    public function getTaskStatus()
    {
        return $this->taskStatus;
    }

    /**
     * Set team
     *
     * @param \AppBundle\Entity\Teams $team
     *
     * @return Tasks
     */
    public function setTeam(\AppBundle\Entity\Teams $team = null)
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

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Tasks
     */
    public function setUser(\AppBundle\Entity\Users $user = null)
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
