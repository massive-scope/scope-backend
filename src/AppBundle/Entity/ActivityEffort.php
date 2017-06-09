<?php

namespace AppBundle\Entity;

/**
 * ActivityEffort
 */
class ActivityEffort
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var float
     */
    private $hours;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $isTracking;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ActivityEffort
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
     * Set hours
     *
     * @param float $hours
     *
     * @return ActivityEffort
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
     * Set description
     *
     * @param string $description
     *
     * @return ActivityEffort
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
     * Set isTracking
     *
     * @param boolean $isTracking
     *
     * @return ActivityEffort
     */
    public function setIsTracking($isTracking)
    {
        $this->isTracking = $isTracking;

        return $this;
    }

    /**
     * Get isTracking
     *
     * @return bool
     */
    public function getIsTracking()
    {
        return $this->isTracking;
    }
    /**
     * @var \AppBundle\Entity\Activity
     */
    private $activity;

    /**
     * @var \AppBundle\Entity\ChargingType
     */
    private $chargingType;


    /**
     * Set activity
     *
     * @param \AppBundle\Entity\Activity $activity
     *
     * @return ActivityEffort
     */
    public function setActivity(\AppBundle\Entity\Activity $activity)
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

    /**
     * Set chargingType
     *
     * @param \AppBundle\Entity\ChargingType $chargingType
     *
     * @return ActivityEffort
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
}
