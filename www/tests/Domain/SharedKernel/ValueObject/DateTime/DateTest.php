<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
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
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testDateIsCorrect(): void
    {
        $date = new Date(2024, 1, 1);
        self::assertEquals('2024-01-01', $date->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testDateWithIncorrectDay(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Date(2024, 1, 32);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateWithIncorrectMonth(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 13, 1);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testDateWithIncorrectYear(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Date(-20, 1, 1);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testCreateFromDatetime(): void
    {
        $datetime = \DateTime::createFromFormat('Y-m-d', '2024-05-07');
        $date = Date::createFromDateTime($datetime);
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testCreateFromTimestamp(): void
    {
        $date = Date::createFromTimestamp(1715112617);
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testCreateFromStringWithDefaultFormatIsCorrect(): void
    {
        $date = Date::createFromString('2024-05-07');
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testCreateFromStringWithDefaultFormatIsIncorrect(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date::createFromString('2024-05-32');
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testCreateFromStringWithFrenchFormatIsCorrect(): void
    {
        $date = Date::createFromString('07/05/2024', Date::FORMAT_STRING_FR);
        self::assertEquals('2024-05-07', $date->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testCreateFromStringWithFrenchFormatIsIncorrect(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        Date::createFromString('32/05/2024', Date::FORMAT_STRING_FR);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testNow() : void {
        $date = new Date(2024,05,07);
        self::assertEquals(
            (new \DateTime())->format(Date::FORMAT_STRING_FR),
            $date->now()->toString(\HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date::FORMAT_STRING_FR)
        );
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testToStringSqlFormat() : void {
        $date = new Date(2024,05,07);
        self::assertEquals(
            '2024-05-07',
            $date->toString(Date::FORMAT_SQL)
        );
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testToStringFrenchFormat() : void {
        $date = new Date(2024,05,07);
        self::assertEquals(
            '07/05/2024',
            $date->toString(Date::FORMAT_STRING_FR)
        );
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testToStringEnglishFormat() : void {
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 05, 07);
        self::assertEquals(
            '05/07/2024',
            $date->toString(\HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date::FORMAT_STRING_EN)
        );
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testEqualsIsCorrect() : void {
        $date1 = new Date(2024,05,07);
        $date2 = new Date(2024,05,07);
        self::assertTrue($date1->equals($date2));
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     * @return void
     */
    public function testEqualsIsIncorrect() : void {
        $date1 = new Date(2024,05,07);
        $date2 = new Date(2027,05,11);
        self::assertFalse($date1->equals($date2));
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testEqualsWithIncorrectParamType() : void {
        $this->expectException(\TypeError::class);
        $date1 = new Date(2024,05,07);
        $date2 = new \DateTime();
        $date1->equals($date2);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     * @return void
     */
    public function testEqualsWithIncorrectValueObjectParamType() : void {
        $this->expectException(InvalidValueObjectException::class);
        $date1 = new Date(2024,05,07);
        $date2 = new LiteralString('aaa');
        $date1->equals($date2);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     * @return void
     */
    public function testToDatetime() : void {
        $date1 = \DateTime::createFromFormat('d/m/Y H:i:s', '07/05/2024 00:00:00');
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals($date1, $dateToTest->toNativeDateTime());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     * @return void
     */
    public function testToTimestamp() : void {
        $date1 = \DateTime::createFromFormat('d/m/Y H:i:s', '07/05/2024 00:00:00');
        $dateToTest = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 05, 07);
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
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     * @return void
     */
    public function testGetYear() : void {
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals(2024, $dateToTest->getYear());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     * @return void
     */
    public function testGetMonth() : void {
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals(05, $dateToTest->getMonth());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     * @return void
     */
    public function testGetDay() : void {
        $dateToTest = new Date(2024, 05, 07);
        self::assertEquals(07, $dateToTest->getDay());
    }

}
