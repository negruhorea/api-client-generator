<?php declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace OpenApi\PetStoreClient\Schema;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;

class PetCollection implements IteratorAggregate, SerializableInterface, Countable, JsonSerializable
{
    /** @var Pet[] */
    private $items;

    /**
     * @param Pet[] $items
     */
    public function __construct(Pet ...$items)
    {
        $this->items = $items;
    }

    public function toArray(): array
    {
        $return = [];
        foreach ($this->items as $item) {
            $return[] = $item->toArray();
        }

        return $return;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @return Pet[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return \count($this->items);
    }

    public function first(): ?Pet
    {
        $first = \reset($this->items);
        if ($first === false) {
            return null;
        }

        return $first;
    }
}
