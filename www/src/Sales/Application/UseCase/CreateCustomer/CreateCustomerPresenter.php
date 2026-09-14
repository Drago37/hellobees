<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\CreateCustomer;

/**
 * Interface
 *
 * @class CreateCustomerPresenter
 * @package HelloBees\Domain\Selling\UseCase\CreateCustomer
 */
interface CreateCustomerPresenter
{
    /**
     * @param CreateCustomerResponse $response
     * @return void
     */
    public function present(CreateCustomerResponse $response): void;
}