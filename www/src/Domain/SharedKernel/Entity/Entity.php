<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Entity;

use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;
use JsonSerializable;

/**
 *
 * Class
 *
 * @class   Entity
 * @package HelloBees\Domain\SharedKernel\Entity
 */
abstract class Entity implements JsonSerializable
{
    /**
     * Entity constructor
     *
     * @param Uuid $uuid
     */
    public function __construct(
        protected Uuid $uuid
    )
    {
    }

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    /**
     * @param Uuid $uuid
     */
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
