<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Repository;

/**
 * Class
 *
 * @class   SortedField
 * @package HelloBees\Domain\SharedKernel\Repository
 */
readonly class SortedField
{

    /**
     * SortedField constructor
     *
     * @param string $field
     * @param int|string $order
     */
    public function __construct(
        private string     $field,
        private int|string $order = ''
    )
    {
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return int|string
     */
    public function getOrder(): int|string
    {
        return $this->order;
    }
}
