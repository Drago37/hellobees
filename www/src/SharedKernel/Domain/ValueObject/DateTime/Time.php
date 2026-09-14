<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\DateTime;

use DateInterval;
use DateTime;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\ValueObjectInterface;

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
     *
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
     *
     * @throws InvalidValueObjectException
     * @return Time
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
     *
     * @throws InvalidValueObjectException
     *@return Time
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
     * @param int $timestamp
     *
     * @throws InvalidValueObjectException
     *@return Time
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
            (int)$dateInterval->format('%H'),
            (int)$dateInterval->format('%i'),
            (int)$dateInterval->format('%s')
        );
    }

    /**
     * @throws InvalidValueObjectException
     *@return Time
     */
    public static function now(): Time
    {
        $dateTimeNow = new DateTime();
        return self::createFromDateTime($dateTimeNow);
    }

    /**
     * @param ValueObjectInterface $time
     *
     * @throws InvalidValueObjectException
     * @return bool
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
     *@return Time
     */
    public static function zero(): Time
    {
        return self::createFromString('00:00:00');
    }

    /**
     * @return \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime
     */
    public function toNativeDateTime(): DateTime
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
        return $this->toNativeDateTime()->format($format);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toNativeDateTime()->format(self::FORMAT_HOURS_MINUTES_SECONDS);
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
        // Do not use !filter_var here because 0 is a falsy value, we need to compare with false instead of 0
        if (filter_var($hour, FILTER_VALIDATE_INT, $options) === false) {
            throw new InvalidValueObjectException("The hour must be an integer between 0 and 23, $hour given");
        }
    }

    /**
     * @param int $minute
     *
     * @throws InvalidValueObjectException
     *@return void
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
     * @param int $second
     * @return void
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
