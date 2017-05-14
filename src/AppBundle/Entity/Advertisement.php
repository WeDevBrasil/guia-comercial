<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advertisement
 *
 * @ORM\Table(name="advertisement")
 * @ORM\Entity
 */
class Advertisement
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(name="title",length=45, type="string", nullable=false)
     */
    private $title;
    
    /**
     * @var string
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;
    
    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="advertisement")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
     */
    private $company;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="advertisement")
     * @ORM\JoinTable(name="advertisement_has_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="advertisement_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;
    
    /**
     * @var string
     * @ORM\Column(name="show_map", type="boolean", nullable=true)
     */
    private $showMap;
    
    /**
     * @var integer
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set title
     *
     * @param string $title
     *
     * @return Advertisement
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
     * Set text
     *
     * @param string $text
     *
     * @return Advertisement
     */
    public function setText($text)
    {
        $this->text = $text;
        
        return $this;
    }
    
    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Set company
     *
     * @param \AppBundle\Entity\Company $company
     *
     * @return Advertisement
     */
    public function setCompany(\AppBundle\Entity\Company $company = null)
    {
        $this->company = $company;
        
        return $this;
    }
    
    /**
     * Get company
     *
     * @return \AppBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
    
    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Advertisement
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;
        
        return $this;
    }
    
    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }
    
    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }
    
    /**
     * Set showMap
     *
     * @param string $showMap
     *
     * @return Advertisement
     */
    public function setShowMap($showMap)
    {
        $this->showMap = $showMap;
        
        return $this;
    }
    
    /**
     * Get showMap
     *
     * @return integer
     */
    public function getShowMap()
    {
        return $this->showMap;
    }
    
    /**
     * Set status
     *
     * @param string $status
     *
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    public function __toString() {
        return $this->text;
        return $this->title;
    }
}

