<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\RemoveProduct;

use HelloBees\Sales\Application\Command\RemoveProduct\RemoveProductCommand;
use HelloBees\Sales\Application\Command\RemoveProduct\RemoveProductHandler;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Enum\ProductType;
use HelloBees\Sales\Domain\Exception\ProductNotFoundException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\Sales\Double\InMemoryProductRepository;
use PHPUnit\Framework\TestCase;

final class RemoveProductHandlerTest extends TestCase
{
    public function testItRemovesAnExistingProduct(): void
    {
        $repository = new InMemoryProductRepository();
        $uuid = Uuid::generate();
        $repository->insert(new Product(
            $uuid,
            ProductType::Swarm,
            5,
            120.0,
            'Bee swarm',
            'A healthy bee swarm',
            '/images/swarm.jpg',
            DateTime::now(),
        ));

        (new RemoveProductHandler($repository))(new RemoveProductCommand($uuid));

        self::assertNull($repository->find($uuid));
    }

    public function testItThrowsWhenTheProductDoesNotExist(): void
    {
        $handler = new RemoveProductHandler(new InMemoryProductRepository());

        $this->expectException(ProductNotFoundException::class);

        $handler(new RemoveProductCommand(Uuid::generate()));
    }
}
