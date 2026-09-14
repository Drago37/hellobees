<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\UpdateProduct;

use HelloBees\Sales\Application\Command\UpdateProduct\UpdateProductCommand;
use HelloBees\Sales\Application\Command\UpdateProduct\UpdateProductHandler;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Enum\ProductType;
use HelloBees\Sales\Domain\Exception\ProductNotFoundException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\Sales\Double\InMemoryProductRepository;
use PHPUnit\Framework\TestCase;

final class UpdateProductHandlerTest extends TestCase
{
    public function testItUpdatesAnExistingProduct(): void
    {
        $repository = new InMemoryProductRepository();
        $uuid = Uuid::generate();
        $repository->insert(new Product(
            $uuid,
            ProductType::Honey,
            10,
            5.5,
            'Chestnut honey jar',
            'A 250g jar of chestnut honey',
            '/images/chestnut-honey.jpg',
            DateTime::now(),
        ));

        $updated = (new UpdateProductHandler($repository))(new UpdateProductCommand(
            $uuid,
            ProductType::Swarm,
            3,
            150.0,
            'Bee swarm',
            'A healthy bee swarm',
            '/images/swarm.jpg',
        ));

        self::assertSame(ProductType::Swarm, $updated->getProductType());
        self::assertSame(3, $updated->getStockQuantity());
        self::assertSame('Bee swarm', $updated->getTitle());
        self::assertSame($updated, $repository->find($uuid));
    }

    public function testItThrowsWhenTheProductDoesNotExist(): void
    {
        $handler = new UpdateProductHandler(new InMemoryProductRepository());

        $this->expectException(ProductNotFoundException::class);

        $handler(new UpdateProductCommand(
            Uuid::generate(),
            ProductType::Honey,
            1,
            1.0,
            'Title',
            'Description',
            '/images/test.jpg',
        ));
    }
}
