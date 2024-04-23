<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\UpdateCustomer;

/**
 * Interface
 *
 * @class UpdateCutomerPresenter
 * @package HelloBees\Domain\Selling\UseCase\UpdateCustomer
 */
interface UpdateCutomerPresenter
{
    /**
     * @param UpdateCustomerResponse $response
     * @return void
     */
    public function present(UpdateCustomerResponse $response): void;
}