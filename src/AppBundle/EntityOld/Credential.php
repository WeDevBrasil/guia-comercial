<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credentials
 *
 * @ORM\Table(name="credentials", indexes={@ORM\Index(name="fk_credentials_credentials_type1_idx", columns={"credential_type_id"})})
 * @ORM\Entity
 */
class Credentials
{
    /**
     * @var integer
     *
     * @ORM\Column(name="credential_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $credentialId;

    /**
     * @var string
     *
     * @ORM\Column(name="credential", type="string", length=45, nullable=true)
     */
    private $credential;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=true)
     */
    private $password;

    /**
     * @var \CredentialsType
     *
     * @ORM\ManyToOne(targetEntity="CredentialsType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="credential_type_id", referencedColumnName="credential_type_id")
     * })
     */
    private $credentialType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="credential")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

