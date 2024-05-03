<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\ValueObject\DateTime;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\Time;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   TimeTest
 * @package HelloBeesTest\Domain\ValueObject\DateTime
 */
class TimeTest extends TestCase
{
    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeIsCorrect(): void
    {
        $date = new Time(23, 59, 01);
        self::assertEquals('23:59:01', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeIsIncorrectByHour(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Time(25, 59, 01);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeIsIncorrectByMinute(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Time(23, 68, 01);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeIsIncorrectBySecond(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Time(23, 59, 61);
    }
}
