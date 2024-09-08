<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
#[ApiResource]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    #[SerializedName('optionDelivery')]
    private ?bool $option_delivery = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    #[SerializedName('deliveryDate')]
    private ?string $delivery_date = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Status $status = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    #[SerializedName('delivery_slot')]
    private ?string $deliverySlot = null;

    #[ORM\Column(length: 255)]
    #[SerializedName('drop_off_date')]
    private ?string $dropOffDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[SerializedName('order_date')]
    private ?\DateTimeInterface $orderDate = null;

    #[ORM\OneToMany(mappedBy: 'order', targetEntity: Item::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isOptionDelivery(): ?bool
    {
        return $this->option_delivery;
    }

    public function setOptionDelivery(bool $option_delivery): static
    {
        $this->option_delivery = $option_delivery;

        return $this;
    }

    public function getDeliveryDate(): ?string

    {
        return $this->delivery_date;
    }

    public function setDeliveryDate(string $delivery_date): static
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function addItem(Item $item): static
{
    if (!$this->items->contains($item)) {
        $this->items->add($item);
        $item->setOrder($this);
    }

    return $this;
}

public function removeItem(Item $item): static
{
    if ($this->items->removeElement($item)) {
        if ($item->getOrder() === $this) {
            $item->setOrder(null);
        }
    }
    return $this;
}
public function getItems(): Collection
{
    return $this->items;
}
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDeliverySlot(): ?string
    {
        return $this->deliverySlot;
    }

    public function setDeliverySlot(string $deliverySlot): static
    {
        $this->deliverySlot = $deliverySlot;

        return $this;
    }

    public function getDropOffDate(): ?string
    {
        return $this->dropOffDate;
    }

    public function setDropOffDate(string $dropOffDate): static
    {
        $this->dropOffDate = $dropOffDate;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): static
    {
        $this->orderDate = $orderDate;

        return $this;
    }

}
