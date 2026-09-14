<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Event;

interface EventInterface
{
    public function raisedAt(): \DateTimeInterface;
}
