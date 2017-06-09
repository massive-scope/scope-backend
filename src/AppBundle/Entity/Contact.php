<?php

namespace AppBundle\Entity;

/**
 * Contact
 */
class Contact
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $salutation;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $fname;

    /**
     * @var string
     */
    private $sname;

    /**
     * @var string
     */
    private $position;

    /**
     * @var string
     */
    private $employeeId;

    /**
     * @var string
     */
    private $employeeShort;

    /**
     * @var string
     */
    private $employeeGroup;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $imageExtension;

    /**
     * @var int
     */
    private $imageCounter = 0;

    /**
     * @var bool
     */
    private $newsletter = true;

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
     * Set salutation
     *
     * @param string $salutation
     *
     * @return Contact
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;

        return $this;
    }

    /**
     * Get salutation
     *
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Contact
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
     * Set fname
     *
     * @param string $fname
     *
     * @return Contact
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set sname
     *
     * @param string $sname
     *
     * @return Contact
     */
    public function setSname($sname)
    {
        $this->sname = $sname;

        return $this;
    }

    /**
     * Get sname
     *
     * @return string
     */
    public function getSname()
    {
        return $this->sname;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Contact
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set employeeId
     *
     * @param string $employeeId
     *
     * @return Contact
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }

    /**
     * Get employeeId
     *
     * @return string
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Set employeeShort
     *
     * @param string $employeeShort
     *
     * @return Contact
     */
    public function setEmployeeShort($employeeShort)
    {
        $this->employeeShort = $employeeShort;

        return $this;
    }

    /**
     * Get employeeShort
     *
     * @return string
     */
    public function getEmployeeShort()
    {
        return $this->employeeShort;
    }

    /**
     * Set employeeGroup
     *
     * @param string $employeeGroup
     *
     * @return Contact
     */
    public function setEmployeeGroup($employeeGroup)
    {
        $this->employeeGroup = $employeeGroup;

        return $this;
    }

    /**
     * Get employeeGroup
     *
     * @return string
     */
    public function getEmployeeGroup()
    {
        return $this->employeeGroup;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Contact
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
     * Set imageExtension
     *
     * @param string $imageExtension
     *
     * @return Contact
     */
    public function setImageExtension($imageExtension)
    {
        $this->imageExtension = $imageExtension;

        return $this;
    }

    /**
     * Get imageExtension
     *
     * @return string
     */
    public function getImageExtension()
    {
        return $this->imageExtension;
    }

    /**
     * Set imageCounter
     *
     * @param integer $imageCounter
     *
     * @return Contact
     */
    public function setImageCounter($imageCounter)
    {
        $this->imageCounter = $imageCounter;

        return $this;
    }

    /**
     * Get imageCounter
     *
     * @return int
     */
    public function getImageCounter()
    {
        return $this->imageCounter;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     *
     * @return Contact
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return bool
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }
    /**
     * @var Company
     */
    private $company;


    /**
     * Set company
     *
     * @param Company $company
     *
     * @return Contact
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
