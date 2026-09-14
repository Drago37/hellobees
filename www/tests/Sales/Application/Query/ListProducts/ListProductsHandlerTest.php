<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Query\ListProducts;

use HelloBees\Sales\Application\Query\ListProducts\ListProductsHandler;
use HelloBees\Sales\Application\Query\ListProducts\ListProductsQuery;
use HelloBees\Sales\Application\Query\ShowProduct\ProductView;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Enum\ProductType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\Sales\Double\InMemoryProductRepository;
use PHPUnit\Framework\TestCase;

final class ListProductsHandlerTest extends TestCase
{
    public function testItReturnsAnEmptyListWhenThereIsNoProduct(): void
    {
        $handler = new ListProductsHandler(new InMemoryProductRepository());

        self::assertSame([], $handler(new ListProductsQuery()));
    }

    public function testItReturnsOneReadModelPerProduct(): void
    {
        $repository = new InMemoryProductRepository();
        foreach (['Acacia honey jar', 'Chestnut honey jar'] as $title) {
            $repository->insert(new Product(
                Uuid::generate(),
                ProductType::Honey,
                10,
                5.0,
                $title,
                'Description',
                '/images/honey.jpg',
                DateTime::now(),
            ));
        }

        $views = (new ListProductsHandler($repository))(new ListProductsQuery());

        self::assertCount(2, $views);
        self::assertContainsOnlyInstancesOf(ProductView::class, $views);
        self::assertEqualsCanonicalizing(
            ['Acacia honey jar', 'Chestnut honey jar'],
            array_map(static fn (ProductView $view): string => $view->title, $views),
        );
    }
}
