<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\DateTime;

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
final readonly class Date implements ValueObjectInterface
{
    public const FORMAT_SQL = 'Y-m-d';
    public const FORMAT_STRING_FR = 'd/m/Y';
    public const FORMAT_STRING_EN = 'm/d/Y';
    public const FORMAT_TIMESTAMP = 'U';

    /**
     * Date constructor
     *
     * @param int $year
     * @param int $month
     * @param int $day
     *
     * @throws InvalidValueObjectException
     */
    public function __construct(
        private int $year,
        private int $month,
        private int $day
    )
    {
        self::getDateTimeFromValue("$year-$month-$day", self::FORMAT_SQL);
    }

    /**
     * @param DateTime $dateTime
     *
     * @throws InvalidValueObjectException
     * @return Date
     */
    public static function createFromDateTime(DateTime $dateTime): Date
    {
        return new self(
            (int)$dateTime->format('Y'),
            (int)$dateTime->format('m'),
            (int)$dateTime->format('d')
        );
    }

    /**
     * @param int $timestamp
     *
     * @throws InvalidValueObjectException
     *@return Date
     */
    public static function createFromTimestamp(int $timestamp): Date
    {
        $dateTime = new DateTime();
        $dateTime->setTimestamp($timestamp);
        return self::createFromDateTime($dateTime);
    }

    /**
     * @param string $value
     * @param string $format
     *
     * @throws InvalidValueObjectException
     *@return Date
     */
    public static function createFromString(string $value, string $format = self::FORMAT_SQL): Date
    {
        return self::createFromDateTime(self::getDateTimeFromValue($value, $format));
    }

    /**
     * @throws InvalidValueObjectException
     *@return Date
     */
    public static function now(): Date
    {
        $dateTimeNow = new DateTime();
        return self::createFromDateTime($dateTimeNow);
    }

    /**
     * @param string $format
     * @return string
     */
    public function toString(string $format = self::FORMAT_SQL): string
    {
        return $this->toNativeDateTime()->format($format);
    }

    /**
     * @param ValueObjectInterface $date
     *
     * @throws InvalidValueObjectException
     * @return bool
     */
    public function equals(ValueObjectInterface $date): bool
    {
        if (!$date instanceof self) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a " . self::class . ", " . get_class($date) . " given"
            );
        }
        return $this->toString() === $date->toString();
    }

    /**
     * @return \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime
     */
    public function toNativeDateTime(): DateTime
    {
        $date = new DateTime();
        $date->setDate($this->year, $this->month, $this->day);
        $date->setTime(0, 0, 0);

        return $date;
    }

    /**
     * @return int
     */
    public function toTimestamp(): int
    {
        $date = new DateTime();
        $date->setDate($this->year, $this->month, $this->day);
        $date->setTime(0, 0, 0);

        return $date->getTimestamp();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toNativeDateTime()->format(self::FORMAT_SQL);
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @param string $value
     * @param string $format
     *
     * @throws InvalidValueObjectException
     * @return DateTime
     */
    protected static function getDateTimeFromValue(string $value, string $format = self::FORMAT_SQL): DateTime
    {
        $dateTime = DateTime::createFromFormat($format, $value);
        $nativeDateErrors = DateTime::getLastErrors();

        if (
            $dateTime === false ||
            (
                $nativeDateErrors !== false &&
                ($nativeDateErrors['warning_count'] > 0 || $nativeDateErrors['error_count'] > 0)
            )
        ) {
            throw new InvalidValueObjectException(
                "Incorrect date : " .
                json_encode(['date' => $value, 'format' => $format, 'errorDateTime' => $nativeDateErrors]),
                ['date' => $value, 'format' => $format, 'errorDateTime' => $nativeDateErrors]
            );
        }
        return $dateTime;
    }
}
