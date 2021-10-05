<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="integer")
     */
    private $copy;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="books")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="books")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Booked::class, cascade={"persist", "remove"})
     */
    private $Bookeds;

    /**
     * @ORM\Column(type="integer", length=15, unique=true )
     */
    private $isbn;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $bookeddate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reserved;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $borrow;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPublishdate(): ?\DateTimeInterface
    {
        return $this->publishdate;
    }

    public function setPublishdate(?\DateTimeInterface $publishdate): self
    {
        $this->publishdate = $publishdate;

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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCopy(): ?int
    {
        return $this->copy;
    }

    public function setCopy(int $copy): self
    {
        $this->copy = $copy;

        return $this;
    }

    public function getCategories(): ?category
    {
        return $this->categories;
    }

    public function setCategories(?category $categories): self
    {
        $this->categories = $categories;

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

    public function getBookeds(): ?Booked
    {
        return $this->Bookeds;
    }

    public function setBookeds(?Booked $Bookeds): self
    {
        $this->Bookeds = $Bookeds;

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

    public function getBookeddate(): ?\DateTimeInterface
    {
        return $this->bookeddate;
    }

    public function setBookeddate(?\DateTimeInterface $bookeddate): self
    {
        $this->bookeddate = $bookeddate;

        return $this;
    }

    public function getReserved(): ?bool
    {
        return $this->reserved;
    }

    public function setReserved(?bool $reserved): self
    {
        $this->reserved = $reserved;

        return $this;
    }

    public function getBorrow(): ?bool
    {
        return $this->borrow;
    }

    public function setBorrow(?bool $borrow): self
    {
        $this->borrow = $borrow;

        return $this;
    }


}
