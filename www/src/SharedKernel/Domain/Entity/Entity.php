<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Entity;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use JsonSerializable;

abstract class Entity implements JsonSerializable
{
    public function __construct(
        protected Uuid $uuid
    )
    {
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function setUuid(Uuid $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return array<string,mixed>
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
