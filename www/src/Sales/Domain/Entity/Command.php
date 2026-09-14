<?php

declare(strict_types=1);


namespace HelloBees\Sales\Domain\Entity;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\SharedKernel\Domain\Entity\Entity;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

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
     * @param \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime $created
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
     * @return \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime $created
     *
     * @return Command
     */
    public function setCreated(DateTime $created): Command
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \HelloBees\Sales\Domain\Collection\ProductCollection
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