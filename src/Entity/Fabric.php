<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FabricRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FabricRepository::class)]
#[ApiResource]
class Fabric
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fabric_name = null;

    #[ORM\Column]
    private ?float $coeff = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabricName(): ?string
    {
        return $this->fabric_name;
    }

    public function setFabricName(string $fabric_name): static
    {
        $this->fabric_name = $fabric_name;

        return $this;
    }

    public function getCoeff(): ?float
    {
        return $this->coeff;
    }

    public function setCoeff(float $coeff): static
    {
        $this->coeff = $coeff;

        return $this;
    }
}
