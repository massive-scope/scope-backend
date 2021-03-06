<?php

namespace AppBundle\Entity;

/**
 * Project
 */
class Project
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $processes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->processes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add process
     *
     * @param Process $process
     *
     * @return Project
     */
    public function addProcess(Process $process)
    {
        $this->processes[] = $process;

        return $this;
    }

    /**
     * Remove process
     *
     * @param Process $process
     */
    public function removeProcess(Process $process)
    {
        $this->processes->removeElement($process);
    }

    /**
     * Get processes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesses()
    {
        return $this->processes;
    }
}
