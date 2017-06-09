<?php

namespace AppBundle\Entity;

/**
 * Project
 */
class Project
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
     * @return Project
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $packages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->packages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add package
     *
     * @param \AppBundle\Entity\Package $package
     *
     * @return Project
     */
    public function addPackage(\AppBundle\Entity\Package $package)
    {
        $this->packages[] = $package;

        return $this;
    }

    /**
     * Remove package
     *
     * @param \AppBundle\Entity\Package $package
     */
    public function removePackage(\AppBundle\Entity\Package $package)
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
}
