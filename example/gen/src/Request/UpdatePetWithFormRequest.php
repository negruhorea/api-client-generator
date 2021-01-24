<?php declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace OpenApi\PetStoreClient\Request;

use OpenApi\PetStoreClient\Schema\SerializableInterface;

class UpdatePetWithFormRequest implements RequestInterface
{
    /** @var int */
    private $petId;

    /** @var string|null */
    private $name;

    /** @var string|null */
    private $status;

    /** @var string */
    private $contentType = '';

    public function __construct(int $petId)
    {
        $this->petId = $petId;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getRoute(): string
    {
        return \strtr('pet/{petId}', ['{petId}' => $this->petId]);
    }

    public function getQueryParameters(): array
    {
        return \array_map(static function ($value) {
            return $value instanceof SerializableInterface ? $value->toArray() : $value;
        }, \array_filter(['name' => $this->name, 'status' => $this->status], static function ($value) {
            return null !== $value;
        }));
    }

    public function getRawQueryParameters(): array
    {
        return ['name' => $this->name, 'status' => $this->status];
    }

    public function getCookies(): array
    {
        return [];
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getBody()
    {
        return null;
    }
}
