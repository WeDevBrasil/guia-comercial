<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactTypes
 *
 * @ORM\Table(name="contact_types")
 * @ORM\Entity
 */
class ContactTypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="contact_type_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contactTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;


}

