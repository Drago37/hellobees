<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\Date;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

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
        $date = new Date(2024, 1, 1);
        self::assertEquals('2024-01-01', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateIsIncorrectByDay(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Date(2024, 1, 32);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateIsIncorrectByMonth(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Date(2024, 13, 1);
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
    public function testCreateFromDatetimeIsCorrect(): void
    {
        $datetime = \DateTime::createFromFormat('Y-m-d', '2024-05-07');
        $date = Date::createFromDateTime($datetime);
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromTimestampIsCorrect(): void
    {
        $date = Date::createFromTimestamp(1715112617);
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithDefaultFormatIsCorrect(): void
    {
        $date = Date::createFromString('2024-05-07');
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithDefaultFormatIsIncorrect(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        Date::createFromString('2024-05-32');
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithFrenchFormatIsCorrect(): void
    {
        $date = Date::createFromString('07/05/2024', Date::FORMAT_STRING_FR);
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithFrenchFormatIsIncorrect(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        Date::createFromString('32/05/2024', Date::FORMAT_STRING_FR);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testNow() : void {
        $date = new Date(2024,05,07);
        self::assertEquals(
            (new \DateTime())->format(Date::FORMAT_STRING_FR),
            $date->now()->toString(Date::FORMAT_STRING_FR)
        );
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToStringSqlFormat() : void {
        $date = new Date(2024,05,07);
        self::assertEquals(
            '2024-05-07',
            $date->toString(Date::FORMAT_SQL)
        );
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToStringFrenchFormat() : void {
        $date = new Date(2024,05,07);
        self::assertEquals(
            '07/05/2024',
            $date->toString(Date::FORMAT_STRING_FR)
        );
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToStringEnglishFormat() : void {
        $date = new Date(2024,05,07);
        self::assertEquals(
            '05/07/2024',
            $date->toString(Date::FORMAT_STRING_EN)
        );
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsCorrect() : void {
        $date1 = new Date(2024,05,07);
        $date2 = new Date(2024,05,07);
        self::assertTrue($date1->equals($date2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsIncorrect() : void {
        $date1 = new Date(2024,05,07);
        $date2 = new Date(2027,05,11);
        self::assertFalse($date1->equals($date2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType() : void {
        $this->expectException(\TypeError::class);
        $date1 = new Date(2024,05,07);
        $date2 = new \DateTime();
        $date1->equals($date2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType() : void {
        $this->expectException(InvalidValueObjectException::class);
        $date1 = new Date(2024,05,07);
        $date2 = new LiteralString('aaa');
        $date1->equals($date2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToDatetime() : void {
        $date1 = \DateTime::createFromFormat('d/m/Y H:i:s', '07/05/2024 00:00:00');
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals($date1, $dateToTest->toDateTime());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToTimestamp() : void {
        $date1 = \DateTime::createFromFormat('d/m/Y H:i:s', '07/05/2024 00:00:00');
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals($date1->getTimestamp(), $dateToTest->toTimestamp());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testMagicToString() : void {
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals($dateToTest->toString(), $dateToTest);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetYear() : void {
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals(2024, $dateToTest->getYear());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetMonth() : void {
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals(05, $dateToTest->getMonth());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetDay() : void {
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals(07, $dateToTest->getDay());
    }

}
