<?php

namespace AppBundle\Entity;

/**
 * Package
 */
class Package
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $hasTimetracking = true;

    /**
     * @var integer
     */
    private $sortOrder;

    /**
     * @var \DateTime
     */
    private $lastStatusUpdate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $activities;

    /**
     * @var \AppBundle\Entity\Process
     */
    private $process;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * @var \AppBundle\Entity\ChargingType
     */
    private $chargingType;

    /**
     * @var \AppBundle\Entity\Status
     */
    private $status;

    /**
     * Constructor
     *
     * @param Process $process
     */
    public function __construct(Process $process)
    {
        $this->process = $process;

        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Package
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
     * Set description
     *
     * @param string $description
     *
     * @return Package
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Package
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set hasTimetracking
     *
     * @param boolean $hasTimetracking
     *
     * @return Package
     */
    public function setHasTimetracking($hasTimetracking)
    {
        $this->hasTimetracking = $hasTimetracking;

        return $this;
    }

    /**
     * Get hasTimetracking
     *
     * @return boolean
     */
    public function getHasTimetracking()
    {
        return $this->hasTimetracking;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return Package
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set lastStatusUpdate
     *
     * @param \DateTime $lastStatusUpdate
     *
     * @return Package
     */
    public function setLastStatusUpdate($lastStatusUpdate)
    {
        $this->lastStatusUpdate = $lastStatusUpdate;

        return $this;
    }

    /**
     * Get lastStatusUpdate
     *
     * @return \DateTime
     */
    public function getLastStatusUpdate()
    {
        return $this->lastStatusUpdate;
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
     * Add activity
     *
     * @param \AppBundle\Entity\Activity $activity
     *
     * @return Package
     */
    public function addActivity(\AppBundle\Entity\Activity $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove activity
     *
     * @param \AppBundle\Entity\Activity $activity
     */
    public function removeActivity(\AppBundle\Entity\Activity $activity)
    {
        $this->activities->removeElement($activity);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set process
     *
     * @param \AppBundle\Entity\Process $process
     *
     * @return Package
     */
    public function setProcess(\AppBundle\Entity\Process $process)
    {
        $this->process = $process;

        return $this;
    }

    /**
     * Get process
     *
     * @return \AppBundle\Entity\Process
     */
    public function getProcess()
    {
        return $this->process;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Package
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

    /**
     * Set chargingType
     *
     * @param \AppBundle\Entity\ChargingType $chargingType
     *
     * @return Package
     */
    public function setChargingType(\AppBundle\Entity\ChargingType $chargingType = null)
    {
        $this->chargingType = $chargingType;

        return $this;
    }

    /**
     * Get chargingType
     *
     * @return \AppBundle\Entity\ChargingType
     */
    public function getChargingType()
    {
        return $this->chargingType;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Package
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }
}
