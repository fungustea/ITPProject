<?php

namespace myBundle\ictBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * career
 */
class career
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $groupname;

    /**
     * @var string
     */
    private $jobs;

    /**
     * @var string
     */
    private $skillInterests;

    /**
     * @var string
     */
    private $profile;

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
     * Set groupname
     *
     * @param string $groupname
     * @return career
     */
    public function setGroupname($groupname)
    {
        $this->groupname = $groupname;

        return $this;
    }

    /**
     * Get groupname
     *
     * @return string 
     */
    public function getGroupname()
    {
        return $this->groupname;
    }

    /**
     * Set jobs
     *
     * @param string $jobs
     * @return career
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;

        return $this;
    }

    /**
     * Get jobs
     *
     * @return string 
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Set skillInterests
     *
     * @param string $skillInterests
     * @return career
     */
    public function setSkillInterests($skillInterests)
    {
        $this->skillInterests = $skillInterests;

        return $this;
    }

    /**
     * Get skillInterests
     *
     * @return string 
     */
    public function getSkillInterests()
    {
        return $this->skillInterests;
    }

    /**
     * Set profile
     *
     * @param string $profile
     * @return career
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return career
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
     * @return career
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
