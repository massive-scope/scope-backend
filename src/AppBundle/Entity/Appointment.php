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

    /**
     * @var Process
     */
    private $process;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Status
     */
    private $status;

    /**
     * @var Package
     */
    private $package;

    /**
     * @var Activity
     */
    private $activity;

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
     * Set process
     *
     * @param Process $process
     *
     * @return Appointment
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
     * @return Appointment
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
     * Set status
     *
     * @param Status $status
     *
     * @return Appointment
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
     * Set package
     *
     * @param Package $package
     *
     * @return Appointment
     */
    public function setPackage(Package $package = null)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Get package
     *
     * @return Package
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set activity
     *
     * @param Activity $activity
     *
     * @return Appointment
     */
    public function setActivity(Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
}
