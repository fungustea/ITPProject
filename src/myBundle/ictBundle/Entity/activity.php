<?php

namespace myBundle\ictBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * activity
 */
class activity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $programname;

    /**
     * @var string
     */
    private $programdetail;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var string
     */
    private $duration;

    /**
     * @var string
     */
    private $agegroup;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $eventdates;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $popular;


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
     * Set programname
     *
     * @param string $programname
     * @return activity
     */
    public function setProgramname($programname)
    {
        $this->programname = $programname;

        return $this;
    }

    /**
     * Get programname
     *
     * @return string 
     */
    public function getProgramname()
    {
        return $this->programname;
    }

    /**
     * Set programdetail
     *
     * @param string $programdetail
     * @return activity
     */
    public function setProgramdetail($programdetail)
    {
        $this->programdetail = $programdetail;

        return $this;
    }

    /**
     * Get programdetail
     *
     * @return string 
     */
    public function getProgramdetail()
    {
        return $this->programdetail;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return activity
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set duration
     *
     * @param string $duration
     * @return activity
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set agegroup
     *
     * @param string $agegroup
     * @return activity
     */
    public function setAgegroup($agegroup)
    {
        $this->agegroup = $agegroup;

        return $this;
    }

    /**
     * Get agegroup
     *
     * @return string 
     */
    public function getAgegroup()
    {
        return $this->agegroup;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return activity
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return activity
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set eventdates
     *
     * @param string $eventdates
     * @return activity
     */
    public function setEventdates($eventdates)
    {
        $this->eventdates = $eventdates;

        return $this;
    }

    /**
     * Get eventdates
     *
     * @return string 
     */
    public function getEventdates()
    {
        return $this->eventdates;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return activity
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set popular
     *
     * @param integer $popular
     * @return activity
     */
    public function setPopular($popular)
    {
        $this->popular = $popular;

        return $this;
    }

    /**
     * Get popular
     *
     * @return integer 
     */
    public function getPopular()
    {
        return $this->popular;
    }
}
