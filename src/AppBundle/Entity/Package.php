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
    private $hasTimetracking = false;

    /**
     * @var integer
     */
    private $sortOrder = 0;

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
     * @var Process
     */
    private $process;

    /**
     * @var User
     */
    private $user;

    /**
     * @var ChargingType
     */
    private $chargingType;

    /**
     * @var Status
     */
    private $status;
    
    /**
     * @var Appointment
     */
    private $appointment;

    /**
     * Constructor
     *
     * @param Process $process
     */
    public function __construct(Process $process)
    {
        $this->process = $process;

        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->date = new \DateTime();
        $this->lastStatusUpdate = new \DateTime();
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
     * @param Activity $activity
     *
     * @return Package
     */
    public function addActivity(Activity $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove activity
     *
     * @param Activity $activity
     */
    public function removeActivity(Activity $activity)
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
     * @param Process $process
     *
     * @return Package
     */
    public function setProcess(Process $process)
    {
        $this->process = $process;

        return $this;
    }

    /**
     * Get process
     *
     * @return Process
     */
    public function getProcess()
    {
        return $this->process;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Package
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set chargingType
     *
     * @param ChargingType $chargingType
     *
     * @return Package
     */
    public function setChargingType(ChargingType $chargingType = null)
    {
        $this->chargingType = $chargingType;

        return $this;
    }

    /**
     * Get chargingType
     *
     * @return ChargingType
     */
    public function getChargingType()
    {
        return $this->chargingType;
    }

    /**
     * Set status
     *
     * @param Status $status
     *
     * @return Package
     */
    public function setStatus(Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set appointment
     *
     * @param Appointment $appointment
     *
     * @return Package
     */
    public function setAppointment(Appointment $appointment = null)
    {
        $this->appointment = $appointment;

        return $this;
    }

    /**
     * Get appointment
     *
     * @return Appointment
     */
    public function getAppointment()
    {
        return $this->appointment;
    }
}
