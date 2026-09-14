<?php

declare(strict_types=1);


namespace HelloBees\Sales\Domain\Entity;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\SharedKernel\Domain\Entity\Entity;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Command extends Entity
{
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

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Command
    {
        $this->created = $created;
        return $this;
    }

    public function getProductCollection(): ProductCollection
    {
        return $this->productCollection;
    }

    public function setProductCollection(ProductCollection $productCollection): Command
    {
        $this->productCollection = $productCollection;
        return $this;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): Command
    {
        $this->customer = $customer;
        return $this;
    }

    public function isPayed(): bool
    {
        return $this->payed;
    }

    public function setPayed(bool $payed): Command
    {
        $this->payed = $payed;
        return $this;
    }
}