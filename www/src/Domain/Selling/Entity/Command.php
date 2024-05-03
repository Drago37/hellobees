<?php

declare(strict_types=1);


namespace HelloBees\Domain\Selling\Entity;

use HelloBees\Domain\Selling\Collection\ProductCollection;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Command
 * @package HelloBees\Domain\Selling\Entity
 */
class Command extends Entity
{
    /**
     * Command constructor
     *
     * @param Uuid $uuid
     * @param DateTime $created
     * @param ProductCollection $productCollection
     * @param Customer $customer
     * @param bool $payed
     */
    public function __construct(
        Uuid                        $uuid,
        protected DateTime          $created,
        protected ProductCollection $productCollection,
        protected Customer          $customer,
        protected bool              $payed
    )
    {
        parent::__construct($uuid);
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
     * @return Command
     */
    public function setCreated(DateTime $created): Command
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return ProductCollection
     */
    public function getProductCollection(): ProductCollection
    {
        return $this->productCollection;
    }

    /**
     * @param ProductCollection $productCollection
     * @return Command
     */
    public function setProductCollection(ProductCollection $productCollection): Command
    {
        $this->productCollection = $productCollection;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Command
     */
    public function setCustomer(Customer $customer): Command
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPayed(): bool
    {
        return $this->payed;
    }

    /**
     * @param bool $payed
     * @return Command
     */
    public function setPayed(bool $payed): Command
    {
        $this->payed = $payed;
        return $this;
    }
}