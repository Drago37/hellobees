<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\ValueObject\Map;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\ValueObjectInterface;

/**
 * Class
 *
 * @class Coordinates
 * @package HelloBees\Domain\SharedKernel\ValueObject\Map
 */
final readonly class Coordinates implements ValueObjectInterface
{
    public const LATITUDE_PATTERN = '/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/';
    public const LONGITUDE_PATTERN = '/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/';

    /**
     * Coordinates constructor
     *
     * @param float $latitude
     * @param float $longitude
     * @throws InvalidValueObjectException
     */
    public function __construct(
        public float $latitude,
        public float $longitude
    )
    {
        if(!preg_match(self::LATITUDE_PATTERN, (string) $latitude)) {
            throw new InvalidValueObjectException('Latitude is not correct', ['latitude' => $latitude]);
        } else if(!preg_match(self::LONGITUDE_PATTERN, (string) $longitude)) {
            throw new InvalidValueObjectException('Latitude is not correct', ['latitude' => $longitude]);
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "$this->latitude (LAT), $this->longitude (LON)";
    }

    /**
     * @param Coordinates $object
     * @return bool
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $object): bool
    {
        if(!$object instanceof Coordinates) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a " . get_class($this) . ", " . get_class($object) . "given",
            );
        }
        return $object->latitude === $this->latitude
            && $object->longitude === $this->longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}