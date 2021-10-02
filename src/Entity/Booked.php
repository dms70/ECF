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
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="bookeds")
     */
    private $books;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="bookeds")
     */
    private $users;

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

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setBookeds($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getBookeds() === $this) {
                $book->setBookeds(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addBooked($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeBooked($this);
        }

        return $this;
    }
}
