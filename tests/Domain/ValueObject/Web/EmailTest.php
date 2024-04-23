<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\ValueObject\Web;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Email;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   EmailTest
 * @package HelloBeesTest\Domain\ValueObject\Web
 */
class EmailTest extends TestCase
{
    /**
     * @return void
     */
    public function testCorrectEmail(): void
    {
        $email = new Email('toto@tutu.fr');
        $this::assertEquals('toto@tutu.fr', $email->getValue());
    }

    /**
     * @return void
     */
    public function testIncorrectEmail(): void
    {
        $this::expectException(InvalidValueObjectException::class);
        $email = new Email('toto@tutu');
    }
}
