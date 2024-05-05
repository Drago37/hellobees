<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\Date;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   DateTest
 * @package HelloBeesTest\Domain\ValueObject\DateTime
 */
class DateTest extends TestCase
{
    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateIsCorrect(): void
    {
        $date = new Date(2019, 1, 1);
        self::assertEquals('2019-01-01', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateIsIncorrectByDay(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Date(2019, 1, 32);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateIsIncorrectByMonth(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Date(2019, 13, 1);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateIsIncorrectByYear(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Date(-20, 1, 1);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromTimestamp(): void
    {
        $date = Date::createFromTimestamp(1699891578);
        self::assertEquals('2023-11-13', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromFrenchDateString(): void
    {
        $date = Date::createFromString('13/11/2023', Date::FORMAT_STRING_FR);
        self::assertEquals('2023-11-13', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStrangeFormatString(): void
    {
        $date = Date::createFromString('13_%2023^11', 'd_%Y^m');
        self::assertEquals('2023-11-13', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testFrenchToFormat(): void
    {
        $date = new Date(2019, 1, 1);
        self::assertEquals('01/01/2019', $date->toString('d/m/Y'));
    }
}
