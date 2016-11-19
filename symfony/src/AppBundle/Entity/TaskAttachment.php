<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskAttachment
 *
 * @ORM\Table(name="task_attachment", indexes={@ORM\Index(name="fk_task_attachment_task1_idx", columns={"task_task_id"})})
 * @ORM\Entity
 */
class TaskAttachment
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

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
     * @ORM\Column(name="task_attachment_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taskAttachmentId;

    /**
     * @var \AppBundle\Entity\Task
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_task_id", referencedColumnName="task_id")
     * })
     */
    private $taskTask;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return TaskAttachment
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TaskAttachment
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TaskAttachment
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
     * @return TaskAttachment
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
     * @return TaskAttachment
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
     * Get taskAttachmentId
     *
     * @return integer
     */
    public function getTaskAttachmentId()
    {
        return $this->taskAttachmentId;
    }

    /**
     * Set taskTask
     *
     * @param \AppBundle\Entity\Task $taskTask
     *
     * @return TaskAttachment
     */
    public function setTaskTask(\AppBundle\Entity\Task $taskTask = null)
    {
        $this->taskTask = $taskTask;

        return $this;
    }

    /**
     * Get taskTask
     *
     * @return \AppBundle\Entity\Task
     */
    public function getTaskTask()
    {
        return $this->taskTask;
    }
}
