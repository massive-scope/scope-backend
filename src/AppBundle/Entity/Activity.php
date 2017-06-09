<?php

namespace AppBundle\Entity;

/**
 * Activity
 */
class Activity
{
    /**
     * @var integer
     */
    private $duration;

    /**
     * @var integer
     */
    private $period;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $charged = false;

    /**
     * @var integer
     */
    private $sortOrder = 0;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $hasReminder = false;

    /**
     * @var boolean
     */
    private $isInternal = false;

    /**
     * @var integer
     */
    private $productionLevel = 0;

    /**
     * @var float
     */
    private $projectedEffort = 0;

    /**
     * @var float
     */
    private $enteredEffort;

    /**
     * @var string
     */
    private $statusDescription;

    /**
     * @var \DateTime
     */
    private $lastUpdate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $efforts;

    /**
     * @var Package
     */
    private $package;

    /**
     * @var Status
     */
    private $status;

    /**
     * @var User
     */
    private $user;

    /**
     * @var User
     */
    private $creator;

    /**
     * @var Company
     */
    private $company;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->efforts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lastUpdate = new \DateTime();
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Activity
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set period
     *
     * @param integer $period
     *
     * @return Activity
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return integer
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Activity
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
     * @return Activity
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
     * Set charged
     *
     * @param boolean $charged
     *
     * @return Activity
     */
    public function setCharged($charged)
    {
        $this->charged = $charged;

        return $this;
    }

    /**
     * Get charged
     *
     * @return boolean
     */
    public function getCharged()
    {
        return $this->charged;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return Activity
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Activity
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
     * Set hasReminder
     *
     * @param boolean $hasReminder
     *
     * @return Activity
     */
    public function setHasReminder($hasReminder)
    {
        $this->hasReminder = $hasReminder;

        return $this;
    }

    /**
     * Get hasReminder
     *
     * @return boolean
     */
    public function getHasReminder()
    {
        return $this->hasReminder;
    }

    /**
     * Set isInternal
     *
     * @param boolean $isInternal
     *
     * @return Activity
     */
    public function setIsInternal($isInternal)
    {
        $this->isInternal = $isInternal;

        return $this;
    }

    /**
     * Get isInternal
     *
     * @return boolean
     */
    public function getIsInternal()
    {
        return $this->isInternal;
    }

    /**
     * Set productionLevel
     *
     * @param integer $productionLevel
     *
     * @return Activity
     */
    public function setProductionLevel($productionLevel)
    {
        $this->productionLevel = $productionLevel;

        return $this;
    }

    /**
     * Get productionLevel
     *
     * @return integer
     */
    public function getProductionLevel()
    {
        return $this->productionLevel;
    }

    /**
     * Set projectedEffort
     *
     * @param float $projectedEffort
     *
     * @return Activity
     */
    public function setProjectedEffort($projectedEffort)
    {
        $this->projectedEffort = $projectedEffort;

        return $this;
    }

    /**
     * Get projectedEffort
     *
     * @return float
     */
    public function getProjectedEffort()
    {
        return $this->projectedEffort;
    }

    /**
     * Set enteredEffort
     *
     * @param float $enteredEffort
     *
     * @return Activity
     */
    public function setEnteredEffort($enteredEffort)
    {
        $this->enteredEffort = $enteredEffort;

        return $this;
    }

    /**
     * Get enteredEffort
     *
     * @return float
     */
    public function getEnteredEffort()
    {
        return $this->enteredEffort;
    }

    /**
     * Set statusDescription
     *
     * @param string $statusDescription
     *
     * @return Activity
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;

        return $this;
    }

    /**
     * Get statusDescription
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Activity
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
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
     * Add effort
     *
     * @param ActivityEffort $effort
     *
     * @return Activity
     */
    public function addEffort(ActivityEffort $effort)
    {
        $this->efforts[] = $effort;

        return $this;
    }

    /**
     * Remove effort
     *
     * @param ActivityEffort $effort
     */
    public function removeEffort(ActivityEffort $effort)
    {
        $this->efforts->removeElement($effort);
    }

    /**
     * Get efforts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEfforts()
    {
        return $this->efforts;
    }

    /**
     * Set package
     *
     * @param Package $package
     *
     * @return Activity
     */
    public function setPackage(Package $package)
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
     * Set status
     *
     * @param Status $status
     *
     * @return Activity
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
     * Set user
     *
     * @param User $user
     *
     * @return Activity
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
     * Set creator
     *
     * @param User $creator
     *
     * @return Activity
     */
    public function setCreator(User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set company
     *
     * @param Company $company
     *
     * @return Activity
     */
    public function setCompany(Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}
