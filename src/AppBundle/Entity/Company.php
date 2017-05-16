<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity
 */
class Company
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="text", nullable=true)
     */
    private $bio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToOne(targetEntity="Address", cascade={"persist"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="company")
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Contact", inversedBy="company")
     * @ORM\JoinTable(name="company_has_contact",
     *   joinColumns={
     *     @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     *   }
     * )
     */
    private $contact;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="company")
     */
    private $advertisement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contact = new \Doctrine\Common\Collections\ArrayCollection();
        $this->advertisement = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get bio
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }
    
    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return Company
     */
    public function setBio(string $bio)
    {
        $this->bio = $bio;
        
        return $this;
    }
    
    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $Address
     *
     * @return Address
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;
        
        return $this;
    }
    
    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    
    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Company
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;
        
        return $this;
    }
    
    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    
    /**
     * Add contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return Company
     */
    public function addContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \AppBundle\Entity\Contact $contact
     */
    public function removeContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contact->removeElement($contact);
    }

    /**
     * Get contact
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContact()
    {
        return $this->contact;
    }
    
    public function __toString() {
        return $this->name;
        return $this->bio;
    }
}
