<?php

namespace HelloBees\SharedKernel\Domain\ValueObject\DateTime;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\ValueObjectInterface;

final class DateTime implements ValueObjectInterface
{
    public const FORMAT_SQL = 'Y-m-d H:i:s';
    public const FORMAT_FR = 'd/m/Y H:i:s';

    /**
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
     * @throws InvalidValueObjectException
     */
    public static function createFromDateTime(\DateTime $dateTime): DateTime
    {
        $date = Date::createFromDateTime($dateTime);
        $time = Time::createFromDateTime($dateTime);

        return new self($date, $time);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public static function createFromTimestamp(int $timestamp): DateTime{
        $date = Date::createFromTimestamp($timestamp);
        $time = Time::createFromTimestamp($timestamp);

        return new self($date, $time);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public static function now(): DateTime
    {
        return new self(Date::now(), Time::now());
    }

    public function toString(string $format = self::FORMAT_SQL): string
    {
        return $this->toNativeDateTime()->format($format);
    }

    public function toNativeDateTime(): \DateTime
    {
        $dateTime = new \DateTime();
        $dateTime->setDate($this->date->getYear(), $this->date->getMonth(), $this->date->getDay());
        $dateTime->setTime($this->time->getHour(), $this->time->getMinute(), $this->time->getSecond());

        return $dateTime;
    }

    public function toTimestamp(): int
    {
        $dateTime = new \DateTime();
        $dateTime->setDate($this->date->getYear(), $this->date->getMonth(), $this->date->getDay());
        $dateTime->setTime($this->time->getHour(), $this->time->getMinute(), $this->time->getSecond());

        return $dateTime->getTimestamp();
    }

    public function getDate(): Date
    {
        return $this->date;
    }

    public function getTime(): ?Time
    {
        return $this->time;
    }

    public function __toString(): string
    {
        return $this->date->toString(Date::FORMAT_STRING_FR) . " à " . $this->time->toString();
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $dateTime): bool
    {
        if (!$dateTime instanceof self) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a " . self::class . ", " . get_class($dateTime) . " given"
            );
        }
        return $this->toString() === $dateTime->toString();
    }
}