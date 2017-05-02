<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Advertisement", mappedBy="tag")
     */
    private $advertisement;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * @return Tag
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
     * Add advertisement
     *
     * @param \AppBundle\Entity\Advertisement $advertisement
     *
     * @return Tag
     */
    public function addAdvertisement(\AppBundle\Entity\Advertisement $advertisement)
    {
        $this->advertisement[] = $advertisement;

        return $this;
    }

    /**
     * Remove advertisement
     *
     * @param \AppBundle\Entity\Advertisement $advertisement
     */
    public function removeAdvertisement(\AppBundle\Entity\Advertisement $advertisement)
    {
        $this->advertisement->removeElement($advertisement);
    }

    /**
     * Get advertisement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvertisement()
    {
        return $this->advertisement;
    }
    
    public function __toString() {
        return $this->name;
    }
}
