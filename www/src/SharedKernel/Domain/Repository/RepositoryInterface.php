<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Repository;

/**
 * @template T of object
 *
 * @extends \IteratorAggregate<int, T>
 */
interface RepositoryInterface extends \IteratorAggregate, \Countable
{
    /**
     * @return \Iterator<T>
     */
    public function getIterator(): \Iterator;

    public function count(): int;

    public function withPagination(int $page, int $itemsPerPage): static;

    /**
     * @return PaginatorInterface<T>
     */
    public function paginator(): ?PaginatorInterface;
}
