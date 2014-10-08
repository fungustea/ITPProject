<?php

namespace myBundle\ictBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * scholarship
 */
class scholarship
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $schoName;

    /**
     * @var string
     */
    private $schoDetail;

    /**
     * @var string
     */
    private $closingDate;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $contact;

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
     * Set schoName
     *
     * @param string $schoName
     * @return scholarship
     */
    public function setSchoName($schoName)
    {
        $this->schoName = $schoName;

        return $this;
    }

    /**
     * Get schoName
     *
     * @return string 
     */
    public function getSchoName()
    {
        return $this->schoName;
    }

    /**
     * Set schoDetail
     *
     * @param string $schoDetail
     * @return scholarship
     */
    public function setSchoDetail($schoDetail)
    {
        $this->schoDetail = $schoDetail;

        return $this;
    }

    /**
     * Get schoDetail
     *
     * @return string 
     */
    public function getSchoDetail()
    {
        return $this->schoDetail;
    }

    /**
     * Set closingDate
     *
     * @param string $closingDate
     * @return scholarship
     */
    public function setClosingDate($closingDate)
    {
        $this->closingDate = $closingDate;

        return $this;
    }

    /**
     * Get closingDate
     *
     * @return string 
     */
    public function getClosingDate()
    {
        return $this->closingDate;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return scholarship
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return scholarship
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
     * Set url
     *
     * @param string $url
     * @return scholarship
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
     * @return scholarship
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
