<?php

namespace App\Entity;

use App\Repository\BookedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookedRepository::class)
 */
class Booked
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $bookeddate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $returndate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirm;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Bookeds")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", length=15, unique=true )
     */
    private $isbn;




    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookeddate(): ?\DateTimeInterface
    {
        return $this->bookeddate;
    }

    public function setBookeddate(\DateTimeInterface $bookeddate): self
    {
        $this->bookeddate = $bookeddate;

        return $this;
    }

    public function getReturndate(): ?\DateTimeInterface
    {
        return $this->returndate;
    }

    public function setReturndate(?\DateTimeInterface $returndate): self
    {
        $this->returndate = $returndate;

        return $this;
    }

    public function getConfirm(): ?bool
    {
        return $this->confirm;
    }

    public function setConfirm(bool $confirm): self
    {
        $this->confirm = $confirm;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }


}
