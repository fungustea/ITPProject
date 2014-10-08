<?php

namespace myBundle\ictBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * teacher
 */
class teacher
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $topic;

    /**
     * @var string
     */
    private $detail;

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
     * Set topic
     *
     * @param string $topic
     * @return teacher
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return string 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return teacher
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return teacher
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
     * @return teacher
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
