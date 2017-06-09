<?php

namespace AppBundle\Entity;

/**
 * UserTimetracking
 */
class UserTimetracking
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var float
     */
    private $hours = 0;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $isTracking = false;

    /**
     * UserTimetracking constructor.
     */
    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Set hours
     *
     * @param float $hours
     *
     * @return UserTimetracking
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return UserTimetracking
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
     * Set description
     *
     * @param string $description
     *
     * @return UserTimetracking
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
     * @return UserTimetracking
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $timestamps;

    /**
     * @var User
     */
    private $user;

    /**
     * @var UserTimetrackingType
     */
    private $userTimetrackingType;


    /**
     * Add timestamp
     *
     * @param UserTimetrackingTimestamp $timestamp
     *
     * @return UserTimetracking
     */
    public function addTimestamp(UserTimetrackingTimestamp $timestamp)
    {
        $this->timestamps[] = $timestamp;

        return $this;
    }

    /**
     * Remove timestamp
     *
     * @param UserTimetrackingTimestamp $timestamp
     */
    public function removeTimestamp(UserTimetrackingTimestamp $timestamp)
    {
        $this->timestamps->removeElement($timestamp);
    }

    /**
     * Get timestamps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimestamps()
    {
        return $this->timestamps;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return UserTimetracking
     */
    public function setUser(User $user)
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
     * Set userTimetrackingType
     *
     * @param UserTimetrackingType $userTimetrackingType
     *
     * @return UserTimetracking
     */
    public function setUserTimetrackingType(UserTimetrackingType $userTimetrackingType)
    {
        $this->userTimetrackingType = $userTimetrackingType;

        return $this;
    }

    /**
     * Get userTimetrackingType
     *
     * @return UserTimetrackingType
     */
    public function getUserTimetrackingType()
    {
        return $this->userTimetrackingType;
    }
}
