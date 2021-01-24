<?php declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace OpenApi\PetStoreClient\Schema;

use DateTimeInterface;
use DoclerLabs\ApiClientException\RequestValidationException;
use JsonSerializable;
use OpenApi\PetStoreClient\Serializer\ContentType\Json\Json;

class Order implements SerializableInterface, JsonSerializable
{
    public const STATUS_PLACED = 'placed';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_DELIVERED = 'delivered';

    public const ALLOWED_STATUS_LIST = [self::STATUS_PLACED, self::STATUS_APPROVED, self::STATUS_DELIVERED];

    /** @var int|null */
    private $id;

    /** @var int|null */
    private $petId;

    /** @var int|null */
    private $quantity;

    /** @var DateTimeInterface|null */
    private $shipDate;

    /** @var string|null */
    private $status;

    /** @var bool|null */
    private $complete;

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

    /**
     * @throws RequestValidationException
     */
    public function setStatus(string $status): self
    {
        if (! \in_array($status, self::ALLOWED_STATUS_LIST, true)) {
            throw new RequestValidationException(\sprintf('Invalid %s value. Given: `%s` Allowed: %s', 'status', $status, Json::encode(self::ALLOWED_STATUS_LIST)));
        }
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
