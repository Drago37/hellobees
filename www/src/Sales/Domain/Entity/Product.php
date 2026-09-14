<?php

declare(strict_types=1);


namespace HelloBees\Sales\Domain\Entity;

use HelloBees\Sales\Domain\Enum\ProductType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Product extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    public function __construct(
        Uuid                  $uuid,
        protected ProductType $productType,
        protected int         $stockQuantity,
        protected float       $price,
        protected string      $title,
        protected string      $description,
        protected string      $pathImage,
        protected DateTime    $created
    )
    {
        parent::__construct($uuid);
    }

    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    public function setProductType(ProductType $productType): Product
    {
        $this->productType = $productType;
        return $this;
    }

    public function getStockQuantity(): int
    {
        return $this->stockQuantity;
    }

    public function setStockQuantity(int $stockQuantity): Product
    {
        $this->stockQuantity = $stockQuantity;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Product
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    public function getPathImage(): string
    {
        return $this->pathImage;
    }

    public function setPathImage(string $pathImage): Product
    {
        $this->pathImage = $pathImage;
        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Product
    {
        $this->created = $created;
        return $this;
    }
}