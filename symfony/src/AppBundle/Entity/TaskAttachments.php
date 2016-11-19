<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * TaskAttachments
 *
 * @ORM\Table(name="task_attachments", indexes={@ORM\Index(name="fk_task_attachments_tasks1_idx", columns={"task_id"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class TaskAttachments
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
     * @ORM\Column(name="name", type="string", length=32, nullable=true)
     */
    private $name;

    /**
     * @Vich\UploadableField(mapping="attachment_files", fileNameProperty="url")
     * @var File
     */
    private $attachmentFile;

    /**
     * @var integer
     *
     * @ORM\Column(name="task_attachment_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taskAttachmentId;

    /**
     * @var \AppBundle\Entity\Tasks
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_id", referencedColumnName="task_id")
     * })
     */
    private $task;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TaskAttachments
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
     * Get taskAttachmentId
     *
     * @return integer
     */
    public function getTaskAttachmentId()
    {
        return $this->taskAttachmentId;
    }

    /**
     * Set task
     *
     * @param \AppBundle\Entity\Tasks $task
     *
     * @return TaskAttachments
     */
    public function setTask(\AppBundle\Entity\Tasks $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \AppBundle\Entity\Tasks
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param File|null $file
     */
    public function setAttachmentFile(File $file = null)
    {
        $this->attachmentFile = $file;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($file) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getAttachmentFile()
    {
        return $this->attachmentFile;
    }

    /**
     * @param $file
     */
    public function setUrl($file)
    {
        $this->url = $file;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
