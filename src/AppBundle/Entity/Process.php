<?php

namespace AppBundle\Entity;

/**
 * Process
 */
class Process
{
    /**
     * @var boolean
     */
    private $isTemplate = false;

    /**
     * @var boolean
     */
    private $isTaskList = false;

    /**
     * @var string
     */
    private $title;

    /**
     * @var float
     */
    private $budget = 0;

    /**
     * @var float
     */
    private $hours = 0;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $statusDescription;

    /**
     * @var \DateTime
     */
    private $lastStatusUpdate;

    /**
     * @var integer
     */
    private $workLoad = 5;

    /**
     * @var boolean
     */
    private $bankHolidayWork = false;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $packages;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var Status
     */
    private $status;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var ChargingType
     */
    private $chargingType;

    /**
     * @var User
     */
    private $assistant;

    /**
     * @var User
     */
    private $user;

    /**
     * @var boolean
     */
    private $budgetPositionHRByTimetracking = false;

    /**
     * Constructor
     */
    public function __construct(Project $project)
    {
        $this->project = $project;

        $this->packages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->startDate = new \DateTime();
        $this->lastStatusUpdate = new \DateTime();
    }

    /**
     * Set isTemplate
     *
     * @param boolean $isTemplate
     *
     * @return Process
     */
    public function setIsTemplate($isTemplate)
    {
        $this->isTemplate = $isTemplate;

        return $this;
    }

    /**
     * Get isTemplate
     *
     * @return boolean
     */
    public function getIsTemplate()
    {
        return $this->isTemplate;
    }

    /**
     * Set isTaskList
     *
     * @param boolean $isTaskList
     *
     * @return Process
     */
    public function setIsTaskList($isTaskList)
    {
        $this->isTaskList = $isTaskList;

        return $this;
    }

    /**
     * Get isTaskList
     *
     * @return boolean
     */
    public function getIsTaskList()
    {
        return $this->isTaskList;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Process
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
     * Set budget
     *
     * @param float $budget
     *
     * @return Process
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set hours
     *
     * @param float $hours
     *
     * @return Process
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return float
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Process
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
     * @return Process
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
     * Set description
     *
     * @param string $description
     *
     * @return Process
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
     * Set statusDescription
     *
     * @param string $statusDescription
     *
     * @return Process
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
     * Set lastStatusUpdate
     *
     * @param \DateTime $lastStatusUpdate
     *
     * @return Process
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
     * Set workLoad
     *
     * @param integer $workLoad
     *
     * @return Process
     */
    public function setWorkLoad($workLoad)
    {
        $this->workLoad = $workLoad;

        return $this;
    }

    /**
     * Get workLoad
     *
     * @return integer
     */
    public function getWorkLoad()
    {
        return $this->workLoad;
    }

    /**
     * Set bankHolidayWork
     *
     * @param boolean $bankHolidayWork
     *
     * @return Process
     */
    public function setBankHolidayWork($bankHolidayWork)
    {
        $this->bankHolidayWork = $bankHolidayWork;

        return $this;
    }

    /**
     * Get bankHolidayWork
     *
     * @return boolean
     */
    public function getBankHolidayWork()
    {
        return $this->bankHolidayWork;
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
     * Add package
     *
     * @param Package $package
     *
     * @return Process
     */
    public function addPackage(Package $package)
    {
        $this->packages[] = $package;

        return $this;
    }

    /**
     * Remove package
     *
     * @param Package $package
     */
    public function removePackage(Package $package)
    {
        $this->packages->removeElement($package);
    }

    /**
     * Get packages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Set project
     *
     * @param Project $project
     *
     * @return Process
     */
    public function setProject(Project $project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set status
     *
     * @param Status $status
     *
     * @return Process
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
     * Set company
     *
     * @param Company $company
     *
     * @return Process
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

    /**
     * Set chargingType
     *
     * @param ChargingType $chargingType
     *
     * @return Process
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
     * Set assistant
     *
     * @param User $assistant
     *
     * @return Process
     */
    public function setAssistant(User $assistant = null)
    {
        $this->assistant = $assistant;

        return $this;
    }

    /**
     * Get assistant
     *
     * @return User
     */
    public function getAssistant()
    {
        return $this->assistant;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Process
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
     * Set budgetPositionHRByTimetracking
     *
     * @param boolean $budgetPositionHRByTimetracking
     *
     * @return Process
     */
    public function setBudgetPositionHRByTimetracking($budgetPositionHRByTimetracking)
    {
        $this->budgetPositionHRByTimetracking = $budgetPositionHRByTimetracking;

        return $this;
    }

    /**
     * Get budgetPositionHRByTimetracking
     *
     * @return boolean
     */
    public function getBudgetPositionHRByTimetracking()
    {
        return $this->budgetPositionHRByTimetracking;
    }
}
