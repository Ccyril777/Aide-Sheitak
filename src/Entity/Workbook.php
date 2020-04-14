<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkbookRepository")
 */
class Workbook
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Leaf", mappedBy="workbook")
     */
    private $leaves;

    public function __construct()
    {
        $this->leaves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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

    /**
     * @return Collection|Leaf[]
     */
    public function getLeaves(): Collection
    {
        return $this->leaves;
    }

    public function addLeaf(Leaf $leaf): self
    {
        if (!$this->leaves->contains($leaf)) {
            $this->leaves[] = $leaf;
            $leaf->setWorkbook($this);
        }

        return $this;
    }

    public function removeLeaf(Leaf $leaf): self
    {
        if ($this->leaves->contains($leaf)) {
            $this->leaves->removeElement($leaf);
            // set the owning side to null (unless already changed)
            if ($leaf->getWorkbook() === $this) {
                $leaf->setWorkbook(null);
            }
        }

        return $this;
    }
}
