<?php

namespace AppBundle\Entity;

/**
 * UserTimetrackingTimestamps
 */
class UserTimetrackingTimestamp
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @var UserTimetracking
     */
    private $userTimetracking;

    /**
     * @var UserTimetrackingType
     */
    private $userTimetrackingType;

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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return UserTimetrackingTimestamp
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return UserTimetrackingTimestamp
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return UserTimetrackingTimestamp
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set userTimetracking
     *
     * @param UserTimetracking $userTimetracking
     *
     * @return UserTimetrackingTimestamp
     */
    public function setUserTimetracking(UserTimetracking $userTimetracking)
    {
        $this->userTimetracking = $userTimetracking;

        return $this;
    }

    /**
     * Get userTimetracking
     *
     * @return UserTimetracking
     */
    public function getUserTimetracking()
    {
        return $this->userTimetracking;
    }

    /**
     * Set userTimetrackingType
     *
     * @param UserTimetrackingType $userTimetrackingType
     *
     * @return UserTimetrackingTimestamp
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
