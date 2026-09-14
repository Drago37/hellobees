<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\CreateCustomer;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;

final readonly class CreateCustomerCommand
{
    public function __construct(
        public Username $username,
        public Address $address,
        public Email $email,
        public PhoneNumber $phoneNumber,
    ) {
    }
}
