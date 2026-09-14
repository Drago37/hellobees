<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\AddProduct;

use HelloBees\Sales\Application\Command\AddProduct\AddProductCommand;
use HelloBees\Sales\Application\Command\AddProduct\AddProductHandler;
use HelloBees\Sales\Domain\Enum\ProductType;
use HelloBeesTest\Sales\Double\InMemoryProductRepository;
use PHPUnit\Framework\TestCase;

final class AddProductHandlerTest extends TestCase
{
    public function testItPersistsAndReturnsTheProduct(): void
    {
        $repository = new InMemoryProductRepository();
        $handler = new AddProductHandler($repository);

        $command = new AddProductCommand(
            ProductType::Honey,
            42,
            9.9,
            'Acacia honey jar',
            'A 500g jar of acacia honey',
            '/images/acacia-honey.jpg',
        );

        $product = $handler($command);

        self::assertSame('Acacia honey jar', $product->getTitle());
        self::assertSame(ProductType::Honey, $product->getProductType());
        self::assertSame($product, $repository->find($product->getUuid()));
    }
}
