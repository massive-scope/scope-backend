<?php

namespace AppBundle\Entity;

/**
 * Appointment
 */
class Appointment
{
    /**
     * @var int
     */
    private $id;

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
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var bool
     */
    private $hasNotification = false;

    /**
     * @var bool
     */
    private $isInternal = false;

    /**
     * @var bool
     */
    private $isAllDay = false;

    /**
     * @var \DateTime
     */
    private $lastStatusUpdate;

    public function __construct()
    {
        $this->startDate = new \DateTime();
        $this->lastStatusUpdate = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Appointment
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
     * @return Appointment
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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Appointment
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Appointment
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set hasNotification
     *
     * @param boolean $hasNotification
     *
     * @return Appointment
     */
    public function setHasNotification($hasNotification)
    {
        $this->hasNotification = $hasNotification;

        return $this;
    }

    /**
     * Get hasNotification
     *
     * @return bool
     */
    public function getHasNotification()
    {
        return $this->hasNotification;
    }

    /**
     * Set isInternal
     *
     * @param boolean $isInternal
     *
     * @return Appointment
     */
    public function setIsInternal($isInternal)
    {
        $this->isInternal = $isInternal;

        return $this;
    }

    /**
     * Get isInternal
     *
     * @return bool
     */
    public function getIsInternal()
    {
        return $this->isInternal;
    }

    /**
     * Set isAllDay
     *
     * @param boolean $isAllDay
     *
     * @return Appointment
     */
    public function setIsAllDay($isAllDay)
    {
        $this->isAllDay = $isAllDay;

        return $this;
    }

    /**
     * Get isAllDay
     *
     * @return bool
     */
    public function getIsAllDay()
    {
        return $this->isAllDay;
    }

    /**
     * Set lastStatusUpdate
     *
     * @param \DateTime $lastStatusUpdate
     *
     * @return Appointment
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
     * @var \AppBundle\Entity\Process
     */
    private $process;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Status
     */
    private $status;

    /**
     * @var \AppBundle\Entity\Package
     */
    private $package;

    /**
     * @var \AppBundle\Entity\Activity
     */
    private $activity;


    /**
     * Set process
     *
     * @param \AppBundle\Entity\Process $process
     *
     * @return Appointment
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
     * @return Appointment
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
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Appointment
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

    /**
     * Set package
     *
     * @param \AppBundle\Entity\Package $package
     *
     * @return Appointment
     */
    public function setPackage(\AppBundle\Entity\Package $package = null)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Get package
     *
     * @return \AppBundle\Entity\Package
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set activity
     *
     * @param \AppBundle\Entity\Activity $activity
     *
     * @return Appointment
     */
    public function setActivity(\AppBundle\Entity\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \AppBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
}
