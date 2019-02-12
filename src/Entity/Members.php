<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass="App\Repository\MembersRepository")
 */
class Members
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;
    /**
     * @ORM\Column(type="array")
     */
    protected $choice;
    
    

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $executive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostcode(): ?int
    {
        return $this->postcode;
    }

    public function setPostcode(?int $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getExecutive(): ?int
    {
        return $this->executive;
    }

    public function getChoice(): ?array
    {
        return $this->choice = array();
    }

    public function setChoice(array $choice): self
    {
        $this->choice = $choice;

        return $this;
    }

    public function setExecutive(?int $executive): self
    {
        $this->executive = $executive;

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->lastname.', '.$this->firstname;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
