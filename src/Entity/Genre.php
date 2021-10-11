<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
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
    private $genrename;

    /**
     * @ORM\OneToMany(targetEntity=book::class, mappedBy="genre")
     */
    private $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenrename(): ?string
    {
        return $this->genrename;
    }

    public function setGenrename(string $genrename): self
    {
        $this->genrename = $genrename;

        return $this;
    }

    /**
     * @return Collection|book[]
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(book $book): self
    {
        if (!$this->book->contains($book)) {
            $this->book[] = $book;
            $book->setGenre($this);
        }

        return $this;
    }

    public function removeBook(book $book): self
    {
        if ($this->book->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getGenre() === $this) {
                $book->setGenre(null);
            }
        }

        return $this;
    }

    public function __ToString ()


    {

         return $this-> genrename;

    }
    

}
