<?php

namespace App\Entity;

use App\Repository\EditeurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditeurRepository::class)
 */
class Editeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $editeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(string $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }


    /**
     * Generates the magic method
     * 
     */
    public function __toString() {
        // to show the name of the Editeur in the select
        return $this->editeur;
        // to show the id of the Editeur in the select
    }
}
