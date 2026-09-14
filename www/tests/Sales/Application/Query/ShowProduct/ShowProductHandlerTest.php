<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Query\ShowProduct;

use HelloBees\Sales\Application\Query\ShowProduct\ProductView;
use HelloBees\Sales\Application\Query\ShowProduct\ShowProductHandler;
use HelloBees\Sales\Application\Query\ShowProduct\ShowProductQuery;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Enum\ProductType;
use HelloBees\Sales\Domain\Exception\ProductNotFoundException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\Sales\Double\InMemoryProductRepository;
use PHPUnit\Framework\TestCase;

final class ShowProductHandlerTest extends TestCase
{
    public function testItReturnsAReadModelForAnExistingProduct(): void
    {
        $repository = new InMemoryProductRepository();
        $uuid = Uuid::generate();
        $repository->insert(new Product(
            $uuid,
            ProductType::Honey,
            42,
            9.9,
            'Acacia honey jar',
            'A 500g jar of acacia honey',
            '/images/acacia-honey.jpg',
            DateTime::now(),
        ));

        $view = (new ShowProductHandler($repository))(new ShowProductQuery($uuid));

        self::assertInstanceOf(ProductView::class, $view);
        self::assertSame((string) $uuid, $view->uuid);
        self::assertSame('honey', $view->productType);
        self::assertSame(42, $view->stockQuantity);
        self::assertSame('Acacia honey jar', $view->title);
    }

    public function testItThrowsWhenTheProductDoesNotExist(): void
    {
        $handler = new ShowProductHandler(new InMemoryProductRepository());

        $this->expectException(ProductNotFoundException::class);

        $handler(new ShowProductQuery(Uuid::generate()));
    }
}
