<?php

namespace HelloBees\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\ValueObjectInterface;

/**
 * Class
 *
 * @class DateTime
 * @package HelloBees\Domain\SharedKernel\ValueObject\DateTime
 */
final class DateTime implements ValueObjectInterface
{
    public const FORMAT_SQL = 'Y-m-d H:i:s';
    public const FORMAT_FR = 'd/m/Y H:i:s';

    /**
     * DateTime constructor
     *
     * @param Date $date
     * @param Time|null $time
     * @throws InvalidValueObjectException
     */
    public function __construct(
        private readonly Date $date,
        private ?Time         $time = null
    )
    {
        if (is_null($time)) {
            $time = Time::zero();
        }
        $this->time = $time;
    }

    /**
     * @param \DateTime $dateTime
     * @return DateTime
     * @throws InvalidValueObjectException
     */
    public static function createFromDateTime(\DateTime $dateTime): DateTime
    {
        $date = Date::createFromDateTime($dateTime);
        $time = Time::createFromDateTime($dateTime);

        return new self($date, $time);
    }

    /**
     * @param int $timestamp
     * @return DateTime
     * @throws InvalidValueObjectException
     */
    public static function createFromTimestamp(int $timestamp): DateTime{
        $date = Date::createFromTimestamp($timestamp);
        $time = Time::createFromTimestamp($timestamp);

        return new self($date, $time);
    }

    /**
     * @return DateTime
     * @throws InvalidValueObjectException
     */
    public static function now(): DateTime
    {
        return new self(Date::now(), Time::now());
    }

    /**
     * @param string $format
     * @return string
     */
    public function toString(string $format = self::FORMAT_SQL): string
    {
        return $this->toDateTime()->format($format);
    }

    /**
     * @return \DateTime
     */
    public function toDateTime(): \DateTime
    {
        $dateTime = new \DateTime();
        $dateTime->setDate($this->date->getYear(), $this->date->getMonth(), $this->date->getDay());
        $dateTime->setTime($this->time->getHour(), $this->time->getMinute(), $this->time->getSecond());

        return $dateTime;
    }

    /**
     * @return int
     */
    public function toTimestamp(): int
    {
        $dateTime = new \DateTime();
        $dateTime->setDate($this->date->getYear(), $this->date->getMonth(), $this->date->getDay());
        $dateTime->setTime($this->time->getHour(), $this->time->getMinute(), $this->time->getSecond());

        return $dateTime->getTimestamp();
    }

    /**
     * @return Date
     */
    public function getDate(): Date
    {
        return $this->date;
    }

    /**
     * @return Time|null
     */
    public function getTime(): ?Time
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->date->toString(Date::FORMAT_STRING_FR) . " à " . $this->time->toString();
    }

    /**
     * @param DateTime $object
     * @return bool
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $object): bool
    {
        if(!$object instanceof DateTime) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a ".get_class($this).", " . get_class($object) . "given",
            );
        }
        return $this->toString() === $object->toString();
    }
}