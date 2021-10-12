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


    public function __ToString ()


    {

         return $this-> genrename;

    }
    

}
