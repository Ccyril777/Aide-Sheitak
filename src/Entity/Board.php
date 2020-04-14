<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoardRepository")
 */
class Board
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
    private $usualName;

    /**
     * @ORM\Column(type="string", length=2500, nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $progress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typology;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $approval;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domain;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typologySI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $technology;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $network;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Leaf", inversedBy="board", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $leaf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsualName(): ?string
    {
        return $this->usualName;
    }

    public function setUsualName(string $usualName): self
    {
        $this->usualName = $usualName;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getProgress(): ?string
    {
        return $this->progress;
    }

    public function setProgress(string $progress): self
    {
        $this->progress = $progress;

        return $this;
    }

    public function getTypology(): ?string
    {
        return $this->typology;
    }

    public function setTypology(string $typology): self
    {
        $this->typology = $typology;

        return $this;
    }

    public function getApproval(): ?string
    {
        return $this->approval;
    }

    public function setApproval(string $approval): self
    {
        $this->approval = $approval;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getTypologySI(): ?string
    {
        return $this->typologySI;
    }

    public function setTypologySI(string $typologySI): self
    {
        $this->typologySI = $typologySI;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getEntity(): ?string
    {
        return $this->entity;
    }

    public function setEntity(string $entity): self
    {
        $this->entity = $entity;

        return $this;
    }

    public function getTechnology(): ?string
    {
        return $this->technology;
    }

    public function setTechnology(string $technology): self
    {
        $this->technology = $technology;

        return $this;
    }

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(string $network): self
    {
        $this->network = $network;

        return $this;
    }

    public function getLeaf(): ?Leaf
    {
        return $this->leaf;
    }

    public function setLeaf(Leaf $leaf): self
    {
        $this->leaf = $leaf;

        return $this;
    }
}
