<?php

namespace AppBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $pwd;

    /**
     * @var float
     */
    private $internalHourlyRate;

    /**
     * @var float
     */
    private $externalHourlyRate;

    /**
     * @var \DateTime
     */
    private $lastLogin;

    /**
     * @var boolean
     */
    private $locked;

    /**
     * @var boolean
     */
    private $passwordForgotten;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set pwd
     *
     * @param string $pwd
     *
     * @return User
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set internalHourlyRate
     *
     * @param float $internalHourlyRate
     *
     * @return User
     */
    public function setInternalHourlyRate($internalHourlyRate)
    {
        $this->internalHourlyRate = $internalHourlyRate;

        return $this;
    }

    /**
     * Get internalHourlyRate
     *
     * @return float
     */
    public function getInternalHourlyRate()
    {
        return $this->internalHourlyRate;
    }

    /**
     * Set externalHourlyRate
     *
     * @param float $externalHourlyRate
     *
     * @return User
     */
    public function setExternalHourlyRate($externalHourlyRate)
    {
        $this->externalHourlyRate = $externalHourlyRate;

        return $this;
    }

    /**
     * Get externalHourlyRate
     *
     * @return float
     */
    public function getExternalHourlyRate()
    {
        return $this->externalHourlyRate;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     *
     * @return User
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set passwordForgotten
     *
     * @param boolean $passwordForgotten
     *
     * @return User
     */
    public function setPasswordForgotten($passwordForgotten)
    {
        $this->passwordForgotten = $passwordForgotten;

        return $this;
    }

    /**
     * Get passwordForgotten
     *
     * @return boolean
     */
    public function getPasswordForgotten()
    {
        return $this->passwordForgotten;
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
     * @var Language
     */
    private $language;


    /**
     * Set language
     *
     * @param Language $language
     *
     * @return User
     */
    public function setLanguage(Language $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     * @var Contact
     */
    private $contact;


    /**
     * Set contact
     *
     * @param Contact $contact
     *
     * @return User
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }
}
