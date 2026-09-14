<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\DateTime;

use DateInterval;
use DateTime;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\ValueObjectInterface;

/**
 * @phpstan-consistent-constructor
 */
final readonly class Time implements ValueObjectInterface
{
    public const FORMAT_HOURS_MINUTES_SECONDS = 'H:i:s';
    public const FORMAT_HOURS_MINUTES = 'H:i';

    /**
     * @throws InvalidValueObjectException
     */
    public function __construct(private int $hour, private int $minute, private int $second)
    {
        $this->verifyHour($hour);
        $this->verifyMinute($minute);
        $this->verifySecond($second);
    }

    /**
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
     * @throws InvalidValueObjectException
     */
    public static function createFromString(string $time, string $format = self::FORMAT_HOURS_MINUTES_SECONDS): Time
    {
        $dateTime = DateTime::createFromFormat($format, $time);
        if ($time !== $dateTime->format($format)) { // Example : 11:99:25 in DateTime is 12:39:25
            throw new InvalidValueObjectException('Invalid value of time', ['time' => $time, 'time_datetime' => $dateTime->format($format)]);
        }
        return self::createFromDateTime($dateTime);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public static function createFromTimestamp(int $timestamp): Time
    {
        $dateTime = new DateTime();
        $dateTime->setTimestamp($timestamp);
        return self::createFromDateTime($dateTime);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public static function createFromDateInterval(DateInterval $dateInterval): Time
    {
        return new self(
            (int)$dateInterval->format('%H'),
            (int)$dateInterval->format('%i'),
            (int)$dateInterval->format('%s')
        );
    }

    /**
     * @throws InvalidValueObjectException
     */
    public static function now(): Time
    {
        $dateTimeNow = new DateTime();
        return self::createFromDateTime($dateTimeNow);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $time): bool
    {
        if (!$time instanceof self) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a " . self::class . ", " . get_class($time) . " given"
            );
        }
        return $this->toString() === $time->toString();
    }

    /**
     * @throws InvalidValueObjectException
     */
    public static function zero(): Time
    {
        return self::createFromString('00:00:00');
    }

    public function toNativeDateTime(): DateTime
    {
        $time = new DateTime('now');
        $time->setTime($this->getHour(), $this->getMinute(), $this->getSecond());

        return $time;
    }

    public function toString(string $format = self::FORMAT_HOURS_MINUTES_SECONDS): string
    {
        return $this->toNativeDateTime()->format($format);
    }

    public function __toString(): string
    {
        return $this->toNativeDateTime()->format(self::FORMAT_HOURS_MINUTES_SECONDS);
    }

    public function getHour(): int
    {
        return $this->hour;
    }

    public function getMinute(): int
    {
        return $this->minute;
    }

    public function getSecond(): int
    {
        return $this->second;
    }

    /**
     * @throws InvalidValueObjectException
     */
    protected function verifyHour(int $hour): void
    {
        $options = [
            'options' => ['min_range' => 0, 'max_range' => 23],
        ];
        // Do not use !filter_var here because 0 is a falsy value, we need to compare with false instead of 0
        if (filter_var($hour, FILTER_VALIDATE_INT, $options) === false) {
            throw new InvalidValueObjectException("The hour must be an integer between 0 and 23, $hour given");
        }
    }

    /**
     * @throws InvalidValueObjectException
     */
    protected function verifyMinute(int $minute): void
    {
        $options = [
            'options' => ['min_range' => 0, 'max_range' => 59],
        ];
        // Do not use !filter_var here because 0 is a falsy value, we need to compare with false instead of 0
        if (filter_var($minute, FILTER_VALIDATE_INT, $options) === false) {
            throw new InvalidValueObjectException(
                "The minute must be an integer between 0 and 59, $minute given"
            );
        }
    }

    /**
     * @throws InvalidValueObjectException
     */
    protected function verifySecond(int $second): void
    {
        $options = [
            'options' => ['min_range' => 0, 'max_range' => 59],
        ];
        // Do not use !filter_var here because 0 is a falsy value, we need to compare with false instead of 0
        if (filter_var($second, FILTER_VALIDATE_INT, $options) === false) {
            throw new InvalidValueObjectException(
                "The second must be an integer between 0 and 59, $second given"
            );
        }
    }
}
