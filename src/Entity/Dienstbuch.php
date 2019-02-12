<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DienstbuchRepository")
 */
class Dienstbuch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    
    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $member;

     /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $members = [];
    
   

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $updated;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * 
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="array")
     */
    public $trainer = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $startdate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $enddate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTrainer(): ?array
    {
        return $this->trainer = array();
    }

    public function setTrainer(array $trainer): self
    {
        $this->trainer = $trainer;

        return $this;
    }

    public function getMember(): ?array
    {
        return $this->member = array();
    }

    public function setMember(array $member): self
    {
        $this->member = $member;

        return $this;
    }

    public function getMembers(): ?array
    {
        return $this->members = array();
    }

    public function setMembers(array $members): self
    {
        $this->members = $members;

        return $this;
    }

    public function getStartdate(): ?\DateTimeInterface
    {
        return $this->startdate;
    }

    public function setStartdate(\DateTimeInterface $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEnddate(): ?\DateTimeInterface
    {
        return $this->enddate;
    }

    public function setEnddate(\DateTimeInterface $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }
}
