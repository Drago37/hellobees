<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Aggregate;

abstract class AggregateRoot
{
    /**
     * @var list<EventInterface>
     */
    private array $events = [];

    protected function pushEvent(EventInterface $event): void
    {
        $this->events[] = $event;
    }

    /**
     * @return list<EventInterface>
     */
    public function pullEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}
