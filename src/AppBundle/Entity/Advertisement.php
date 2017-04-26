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
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="advertisement")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;
    
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
     * @return Category
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
     * @return Category
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
     * @return City
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
    
    public function __toString() {
        return $this->text;
        return $this->title;
    }
}

