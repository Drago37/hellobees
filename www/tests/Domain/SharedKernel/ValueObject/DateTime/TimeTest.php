<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    /**
     * @throws InvalidValueObjectException
     */
    public function testTimeIsCorrect(): void
    {
        $date = new Time(23, 59, 01);
        self::assertEquals('23:59:01', $date->toString());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testTimeWithIncorrectHour(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(25, 59, 01);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testTimeWithIncorrectMinute(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(23, 68, 01);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testTimeWithIncorrectSecond(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Time(23, 59, 61);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testCreateFromDateTime(): void
    {
        $datetime = new \DateTime();
        $time = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time::createFromDateTime($datetime);
        self::assertEquals($datetime->format('H:i:s'), $time->toString());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithFullFormat(): void
    {
        $time = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time::createFromString('11:30:25');
        self::assertEquals('11:30:25', $time->toString());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithHourMinuteFormat(): void
    {
        $time = Time::createFromString('11:30', \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time::FORMAT_HOURS_MINUTES);
        self::assertEquals('11:30:00', $time->toString());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithIncorrectTime(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        Time::createFromString('11:99:25');
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testCreateFromTimestamp(): void
    {
        $datetime = new \DateTime();
        $time = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time::createFromTimestamp($datetime->getTimestamp());
        self::assertEquals($datetime->format('H:i:s'), $time->toString());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testCreateFromDateInterval(): void
    {
        $dateInterval = new \DateInterval("PT2H8M22S"); // 02:08:22
        $time = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time::createFromDateInterval($dateInterval);
        self::assertEquals($dateInterval->format('%H:%I:%s'), $time->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testNow() : void {
        $time = new Time(5,10,15);
        self::assertEquals(
            (new \DateTime())->format(\HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time::FORMAT_HOURS_MINUTES_SECONDS),
            $time->now()->toString()
        );
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testToStringWithDefaultFormat() : void {
        $time = new Time(5,10,15);
        self::assertEquals(
            "05:10:15",
            $time->toString()
        );
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testToStringWithHourMinutesFormat() : void {
        $time = new Time(5,10,15);
        self::assertEquals(
            "05:10",
            $time->toString(Time::FORMAT_HOURS_MINUTES)
        );
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsCorrect() : void {
        $time1 = new Time(5,10,15);
        $time2 = new Time(5,10,15);
        self::assertTrue($time1->equals($time2));
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsIncorrect() : void {
        $time1 = new Time(5,10,15);
        $time2 = new Time(7,10,15);
        self::assertFalse($time1->equals($time2));
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType() : void {
        $this->expectException(\TypeError::class);
        $time = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(5,10,15);
        $time2 = new \DateTime();
        $time->equals($time2);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType() : void {
        $this->expectException(InvalidValueObjectException::class);
        $time = new Time(5,10,15);
        $time2 = new LiteralString('aaa');
        $time->equals($time2);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testMagicToString() : void {
        $time = new Time(5,10,15);
        self::assertEquals($time->toString(), $time);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testGetHour() : void {
        $time = new Time(5,10,15);
        self::assertEquals(5, $time->getHour());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testGetMinute() : void {
        $time = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(5,10,15);
        self::assertEquals(10, $time->getMinute());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testGetSecond() : void {
        $time = new Time(5,10,15);
        self::assertEquals(15, $time->getSecond());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testZero() : void {
        $time = new Time(5,10,15);
        self::assertEquals("00:00:00", $time->zero()->toString());
    }

}
