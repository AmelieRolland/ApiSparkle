<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\GenderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenderRepository::class)]
#[ApiResource]
class Gender
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $gender_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenderName(): ?string
    {
        return $this->gender_name;
    }

    public function setGenderName(string $gender_name): static
    {
        $this->gender_name = $gender_name;

        return $this;
    }
}
