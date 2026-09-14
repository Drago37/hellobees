<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Event;

interface EventBusInterface
{
    public function fire(EventInterface $event): void;
}
