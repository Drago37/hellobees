<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Collection;

use Generator;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

/**
 * @template TItem of object
 * @extends IteratorAggregate<TItem>
 */
interface CollectionInterface extends IteratorAggregate, JsonSerializable
{
    /**
     * Return all items of collection
     *
     * @return TItem[]
     */
    public function all(): array;

    /**
     * Delete all items of collection
     *
     * @return CollectionInterface<TItem>
     */
    public function clear(): CollectionInterface;

    /**
     * @param TItem $item
     */
    public function contains($item): bool;

    /**
     * @return TItem
     */
    public function get(int|string $key);

    public function has(int|string $key): bool;

    /**
     * Return an array with the keys of collection
     *
     * @return array<int|string>
     */
    public function keys(): array;

    public function isEmpty(): bool;

    /**
     * Return the the number of items of collection
     */
    public function length(): int;

    /**
     * @return CollectionInterface<TItem>
     */
    public function filter(callable $p): CollectionInterface;

    /**
     * Merge collections with actual collection. Collections must to be the same of actual.
     *
     * @param CollectionInterface<TItem> ...$collections
     * @return CollectionInterface<TItem>
     */
    public function mergeWith(CollectionInterface ...$collections): CollectionInterface;

    /**
     * @param TItem $item
     * @return CollectionInterface<TItem>
     */
    public function add(int|string $key, $item): CollectionInterface;

    /**
     * @param TItem $item
     * @return CollectionInterface<TItem>
     */
    public function put(int|string $key, $item): CollectionInterface;

    public function remove(int|string $key): bool;

    /**
     * Return an array of items of collection
     *
     * @return array<TItem>
     */
    public function values(): array;

    public function toJson(): string;

    /**
     * @return Generator<int|string,TItem>
     */
    public function getIterator(): Traversable;
}
