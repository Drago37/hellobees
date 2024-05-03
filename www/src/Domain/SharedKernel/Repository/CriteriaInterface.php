<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Repository;

/**
 * Interface
 *
 * @class   CriteriaInterface
 * @package HelloBees\Domain\SharedKernel\Repository
 */
interface CriteriaInterface
{
    /**
     * @param string $criterion
     * @return CriteriaInterface
     */
    public function add(string $criterion): CriteriaInterface;

    /**
     * @param string $criterion
     * @return CriteriaInterface
     */
    public function addAnd(string $criterion): CriteriaInterface;

    /**
     * @param string $criterion
     * @return CriteriaInterface
     */
    public function addOr(string $criterion): CriteriaInterface;

    /**
     * @return string
     */
    public function getAsString(): string;
}
