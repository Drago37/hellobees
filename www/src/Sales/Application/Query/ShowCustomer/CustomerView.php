<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowCustomer;

use HelloBees\Sales\Domain\Entity\Customer;

final readonly class CustomerView
{
    public function __construct(
        public string $uuid,
        public string $username,
        public string $address,
        public string $email,
        public string $phoneNumber,
        public string $created,
    ) {
    }

    public static function fromEntity(Customer $customer): self
    {
        return new self(
            (string) $customer->getUuid(),
            $customer->getUsername()->getFullName(),
            (string) $customer->getAddress(),
            (string) $customer->getEmail(),
            (string) $customer->getPhoneNumber(),
            $customer->getCreated()->toString(),
        );
    }
}
