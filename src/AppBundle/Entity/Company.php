<?php

namespace AppBundle\Entity;

/**
 * Company
 */
class Company
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $logoExtension;

    /**
     * @var integer
     */
    private $logoCounter = 0;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Company
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set logoExtension
     *
     * @param string $logoExtension
     *
     * @return Company
     */
    public function setLogoExtension($logoExtension)
    {
        $this->logoExtension = $logoExtension;

        return $this;
    }

    /**
     * Get logoExtension
     *
     * @return string
     */
    public function getLogoExtension()
    {
        return $this->logoExtension;
    }

    /**
     * Set logoCounter
     *
     * @param integer $logoCounter
     *
     * @return Company
     */
    public function setLogoCounter($logoCounter)
    {
        $this->logoCounter = $logoCounter;

        return $this;
    }

    /**
     * Get logoCounter
     *
     * @return integer
     */
    public function getLogoCounter()
    {
        return $this->logoCounter;
    }
}
