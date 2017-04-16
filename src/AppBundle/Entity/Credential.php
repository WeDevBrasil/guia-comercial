<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credential
 *
 * @ORM\Table(name="credential", indexes={@ORM\Index(name="fk_credential_credential_type1_idx", columns={"credential_type_id"})})
 * @ORM\Entity
 */
class Credential
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
     * @var \CredentialType
     *
     * @ORM\ManyToOne(targetEntity="CredentialType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="credential_type_id", referencedColumnName="id")
     * })
     */
    private $credentialType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="credential")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set credential
     *
     * @param string $credential
     *
     * @return Credential
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;

        return $this;
    }

    /**
     * Get credential
     *
     * @return string
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Credential
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set credentialType
     *
     * @param \AppBundle\Entity\CredentialType $credentialType
     *
     * @return Credential
     */
    public function setCredentialType(\AppBundle\Entity\CredentialType $credentialType = null)
    {
        $this->credentialType = $credentialType;

        return $this;
    }

    /**
     * Get credentialType
     *
     * @return \AppBundle\Entity\CredentialType
     */
    public function getCredentialType()
    {
        return $this->credentialType;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Credential
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
