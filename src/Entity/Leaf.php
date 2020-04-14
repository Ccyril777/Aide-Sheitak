<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeafRepository")
 */
class Leaf
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Workbook", inversedBy="leaves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $workbook;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Board", mappedBy="leaf", cascade={"persist", "remove"})
     */
    private $board;

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

    public function getWorkbook(): ?Workbook
    {
        return $this->workbook;
    }

    public function setWorkbook(?Workbook $workbook): self
    {
        $this->workbook = $workbook;

        return $this;
    }

    public function getBoard(): ?Board
    {
        return $this->board;
    }

    public function setBoard(Board $board): self
    {
        $this->board = $board;

        // set the owning side of the relation if necessary
        if ($board->getLeaf() !== $this) {
            $board->setLeaf($this);
        }

        return $this;
    }
}
