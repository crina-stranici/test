<?php

namespace Crina\SiteManagement\SiteBundle\Entity;

class Site
{
    protected $id;

    protected $name;
    
    protected $url;

    protected $isActive;
    
    protected $createdAt;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    public function getIsActive()
    {
        return $this->isActive;
    }
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}