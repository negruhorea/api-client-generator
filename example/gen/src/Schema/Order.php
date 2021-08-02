<?php declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace OpenApi\PetStoreClient\Schema;

use DateTimeInterface;
use JsonSerializable;

class Order implements SerializableInterface, JsonSerializable
{
    public const STATUS_PLACED = 'placed';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_DELIVERED = 'delivered';

    private ?int $id = null;

    private ?int $petId = null;

    private ?int $quantity = null;

    private ?DateTimeInterface $shipDate = null;

    private ?string $status = null;

    private ?bool $complete = null;

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setPetId(int $petId): self
    {
        $this->petId = $petId;

        return $this;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function setShipDate(DateTimeInterface $shipDate): self
    {
        $this->shipDate = $shipDate;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setComplete(bool $complete): self
    {
        $this->complete = $complete;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPetId(): ?int
    {
        return $this->petId;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function getShipDate(): ?DateTimeInterface
    {
        return $this->shipDate;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getComplete(): ?bool
    {
        return $this->complete;
    }

    public function toArray(): array
    {
        $fields = [];
        if ($this->id !== null) {
            $fields['id'] = $this->id;
        }
        if ($this->petId !== null) {
            $fields['petId'] = $this->petId;
        }
        if ($this->quantity !== null) {
            $fields['quantity'] = $this->quantity;
        }
        if ($this->shipDate !== null) {
            $fields['shipDate'] = $this->shipDate->format(DATE_RFC3339);
        }
        if ($this->status !== null) {
            $fields['status'] = $this->status;
        }
        if ($this->complete !== null) {
            $fields['complete'] = $this->complete;
        }

        return $fields;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
