<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CredentialsType
 *
 * @ORM\Table(name="credentials_type")
 * @ORM\Entity
 */
class CredentialsType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="credential_type_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $credentialTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;


}

