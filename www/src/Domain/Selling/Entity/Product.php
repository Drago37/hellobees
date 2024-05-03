<?php

declare(strict_types=1);


namespace HelloBees\Domain\Selling\Entity;

use HelloBees\Domain\Selling\Enum\ProductType;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Product
 * @package HelloBees\Domain\Selling\Entity
 */
class Product extends Entity
{
    /**
     * Product constructor
     *
     * @param Uuid $uuid
     * @param ProductType $productType
     * @param int $stockQuantity
     * @param float $price
     * @param string $title
     * @param string $description
     * @param string $pathImage
     * @param DateTime $created
     */
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

    /**
     * @return ProductType
     */
    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    /**
     * @param ProductType $productType
     * @return Product
     */
    public function setProductType(ProductType $productType): Product
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return int
     */
    public function getStockQuantity(): int
    {
        return $this->stockQuantity;
    }

    /**
     * @param int $stockQuantity
     * @return Product
     */
    public function setStockQuantity(int $stockQuantity): Product
    {
        $this->stockQuantity = $stockQuantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): Product
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPathImage(): string
    {
        return $this->pathImage;
    }

    /**
     * @param string $pathImage
     * @return Product
     */
    public function setPathImage(string $pathImage): Product
    {
        $this->pathImage = $pathImage;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return Product
     */
    public function setCreated(DateTime $created): Product
    {
        $this->created = $created;
        return $this;
    }
}