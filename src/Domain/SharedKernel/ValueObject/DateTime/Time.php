<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\ValueObjectInterface;
use DateInterval;
use DateTime;

/**
 * Class
 *
 * @class   Date
 * @package HelloBees\Domain\SharedKernel\ValueObject\DateTime
 * @phpstan-consistent-constructor
 */
final readonly class Time implements ValueObjectInterface
{
    public const FORMAT_HOURS_MINUTES_SECONDS = 'H:i:s';
    public const FORMAT_HOURS_MINUTES = 'H:i';

    /**
     * Time constructor
     *
     * @param int $hour
     * @param int $minute
     * @param int $second
     * @throws InvalidValueObjectException
     */
    public function __construct(private int $hour, private int $minute, private int $second)
    {
        $this->verifyHour($hour);
        $this->verifyMinute($minute);
        $this->verifySecond($second);
    }

    /**
     * @param DateTime $dateTime
     * @return Time
     * @throws InvalidValueObjectException
     */
    public static function createFromDateTime(DateTime $dateTime): Time
    {
        return new self(
            (int)$dateTime->format('H'),
            (int)$dateTime->format('i'),
            (int)$dateTime->format('s')
        );
    }

    /**
     * @param string $time
     * @param string $format
     * @return Time
     * @throws InvalidValueObjectException
     */
    public static function createFromString(string $time, string $format = self::FORMAT_HOURS_MINUTES_SECONDS): Time
    {
        $dateTime = DateTime::createFromFormat($format, $time);
        return self::createFromDateTime($dateTime);
    }

    /**
     * @param int $timestamp
     * @return Time
     * @throws InvalidValueObjectException
     */
    public static function createFromTimestamp(int $timestamp): Time
    {
        $dateTime = new DateTime();
        $dateTime->setTimestamp($timestamp);
        return self::createFromDateTime($dateTime);
    }

    /**
     * @param DateInterval $dateInterval
     * @return Time
     * @throws InvalidValueObjectException
     */
    public static function createFromDateInterval(DateInterval $dateInterval): Time
    {
        return new self(
            (int)$dateInterval->format('H'),
            (int)$dateInterval->format('i'),
            (int)$dateInterval->format('s')
        );
    }

    /**
     * @return Time
     * @throws InvalidValueObjectException
     */
    public static function now(): Time
    {
        $dateTimeNow = new DateTime();
        return self::createFromDateTime($dateTimeNow);
    }

    /**
     * @param Time $object
     * @return bool
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $object): bool
    {
        if(!$object instanceof Time) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a ".get_class($this).", " . get_class($object) . "given",
            );
        }
        return $this->toString() === $object->toString();
    }

    /**
     * @return Time
     * @throws InvalidValueObjectException
     */
    public static function zero(): Time
    {
        return self::createFromString('00:00:00', self::FORMAT_HOURS_MINUTES_SECONDS);
    }

    /**
     * @return DateTime
     */
    public function toDateTime(): DateTime
    {
        $time = new DateTime('now');
        $time->setTime($this->getHour(), $this->getMinute(), $this->getSecond());

        return $time;
    }

    /**
     * @param string $format
     * @return string
     */
    public function toString(string $format = self::FORMAT_HOURS_MINUTES_SECONDS): string
    {
        return $this->toDateTime()->format($format);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toDateTime()->format(self::FORMAT_HOURS_MINUTES_SECONDS);
    }

    /**
     * To know if a time is the same of the actual time of this value object
     *
     * @param Time $time
     * @return bool
     */
    public function sameValueAs(Time $time): bool
    {
        return $this->getHour() === $time->getHour() &&
            $this->getMinute() === $time->getMinute() &&
            $this->getSecond() === $time->getSecond();
    }

    /**
     * @return int
     */
    public function getHour(): int
    {
        return $this->hour;
    }

    /**
     * @return int
     */
    public function getMinute(): int
    {
        return $this->minute;
    }

    /**
     * @return int
     */
    public function getSecond(): int
    {
        return $this->second;
    }

    /**
     * @param int $hour
     * @return void
     * @throws InvalidValueObjectException
     */
    protected function verifyHour(int $hour): void
    {
        $options = [
            'options' => ['min_range' => 0, 'max_range' => 23],
        ];
        if (!filter_var($hour, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidValueObjectException("The hour must be an integer between 0 and 23, $hour given");
        }
    }

    /**
     * @param int $minute
     * @return void
     * @throws InvalidValueObjectException
     */
    protected function verifyMinute(int $minute): void
    {
        $options = [
            'options' => ['min_range' => 0, 'max_range' => 59],
        ];
        if (!filter_var($minute, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidValueObjectException(
                "The minute must be an integer between 0 and 59, $minute given"
            );
        }
    }

    /**
     * @param int $second
     * @return void
     * @throws InvalidValueObjectException
     */
    protected function verifySecond(int $second): void
    {
        $options = [
            'options' => ['min_range' => 0, 'max_range' => 59],
        ];
        if (!filter_var($second, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidValueObjectException(
                "The second must be an integer between 0 and 59, $second given"
            );
        }
    }
}
