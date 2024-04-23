<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Collection;

use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use Generator;
use Traversable;

/**
 * Class
 *
 * @class      Collection
 * @package    HelloBees\Domain\SharedKernel\Collection
 * @template   TItem of object
 * @implements CollectionInterface<TItem>
 */
abstract class Collection implements CollectionInterface
{
    /**
     * @var TItem[] $items
     */
    protected array $items;

    /**
     * Collection constructor
     *
     * @param TItem[] $items Object array to transform in collection.
     * @throws CollectionException
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->verifyItem($item);
        }
        $this->items = $items;

    }

    /**
     * @return Collection<TItem>
     */
    public function clear(): CollectionInterface
    {
        $this->items = [];
        return $this;
    }

    /**
     * @param TItem $item
     * @return bool
     */
    public function contains($item): bool
    {
        return in_array($item, $this->items);
    }

    /**
     * @param int|string $key
     * @return TItem
     * @throws CollectionException
     */
    public function get(int|string $key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        throw new CollectionException("Key $key not found in the collection");
    }

    /**
     * @param int|string $key
     * @return bool
     */
    public function has(int|string $key): bool
    {
        return isset($this->items[$key]);
    }

    /**
     * @return array<int|string>
     */
    public function keys(): array
    {
        return array_keys($this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * @return int
     */
    public function length(): int
    {
        return count($this->items);
    }

    /**
     * @param callable $p
     * @return Collection<TItem>
     * @throws CollectionException
     */
    public function filter(callable $p): CollectionInterface
    {
        return new static(array_filter($this->items, $p));
    }

    /**
     * Merge collections with actual collection. Collections must to be the same of actual.
     *
     * @param CollectionInterface<TItem> ...$collections
     * @return Collection<TItem>
     * @throws CollectionException
     */
    public function mergeWith(CollectionInterface ...$collections): CollectionInterface
    {
        $itemsBackup = $this->items;
        foreach ($collections as $collection) {
            if (get_class($collection) === get_class($this)) {
                foreach ($collection->all() as $key => $item) {
                    $this->put($key, $item);
                }
            } else {
                // si échec en remet la collection dans son état d'origine
                $this->items = $itemsBackup;
                throw new CollectionException(
                    "Collections to merge must be instances of " . get_class($this) .
                    ", " . get_class($collection) . " given"
                );
            }
        }
        return $this;
    }

    /**
     * @return TItem[]
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * Add new item at the collection, if key exists then adding aborted
     *
     * @param int|string $key
     * @param TItem $item
     * @return Collection<TItem>
     * @throws CollectionException
     */
    public function add(int|string $key, $item): CollectionInterface
    {
        if (isset($this->items[$key])) {
            throw new CollectionException('Key {$key} already used in this collection');
        }
        $this->verifyItem($item);
        $this->items[$key] = $item;
        return $this;
    }

    /**
     * @param int|string $key
     * @param TItem $item
     * @return Collection<TItem>
     * @throws CollectionException
     */
    public function put(int|string $key, $item): CollectionInterface
    {
        $this->verifyItem($item);
        $this->items[$key] = $item;
        return $this;
    }

    /**
     * @param int|string $key
     * @return bool
     */
    public function remove(int|string $key): bool
    {
        if ($this->has($key)) {
            unset($this->items[$key]);
            return true;
        }

        return false;
    }

    /**
     * @return array<TItem>
     */
    public function values(): array
    {
        return array_values($this->items);
    }

    /**
     * @return Generator<int|string,TItem>
     */
    public function getIterator(): Traversable
    {
        foreach ($this->items as $key => $item) {
            yield $key => $item;
        }
    }

    /**
     * @return array<string,mixed>[]
     * @throws CollectionException
     */
    public function jsonSerialize(): array
    {
        $serializedItems = [];
        foreach ($this->items as $item) {
            if (method_exists($item, 'jsonSerialize')) {
                $serializedItems[] = $item->jsonSerialize();
            } else {
                $serializedItems[] = get_object_vars($item);
            }
        }
        return $serializedItems;
    }

    /**
     * @return string
     * @throws CollectionException
     */
    public function toJson(): string
    {
        $json = json_encode($this->jsonSerialize());
        if (!$json) {
            throw new CollectionException(
                "Stringify the collection to json failed",
                ['serializedCollection' => $this->jsonSerialize()]
            );
        }
        return $json;
    }

    /**
     * @param TItem $item
     * @return void
     * @throws CollectionException
     */
    protected function verifyItem($item): void
    {
        $class = $this->itemClass();
        if (!$item instanceof $class) {
            throw new CollectionException("Item must be an instance of $class, " . get_class($item) . " given");
        }
    }

    /**
     * Return the name of item class in the collection
     *
     * @return class-string<TItem>
     */
    abstract protected function itemClass(): string;
}
