<?php
/**
 * ----------------------------------
 * The model that has uuid column
 * ----------------------------------
 * This will generate a new uuid when creating
 * a new model
 */
namespace App\Concerns;

use App\Enums\ProductStatus;

trait HasStatus {

    public function status()
    {
        return ProductStatus::name($this->status);
    }
    /**
     * Determine if the product available for sale
     * 
     * @return bool
     */
    public function isAvailable()
    {
        return (bool)$this->status === (bool)ProductStatus::AVAILABLE;
    }

    /**
     * Determine if the product reserved by an authenticated user
     * 
     * @return bool
     */
    public function isReserved()
    {
        return (bool)$this->status === (bool)ProductStatus::RESERVED;
    }

    /**
     * Determine if the product sold by an authenticated user
     * 
     * @return bool
     */
    public function isSold()
    {
        return (bool)$this->status === (bool)ProductStatus::SOLD;
    }

    /**
     * Make this product available for sale
     */
    public function makeAvailable()
    {
        $this->status = ProductStatus::AVAILABLE;

        return $this;
    }

    /**
     * Make this product reserved
     */
    public function makeReserved()
    {
        $this->status = ProductStatus::RESERVED;

        return $this;
    }

    /**
     * Make this product reserved
     */
    public function makeSold()
    {
        $this->status = ProductStatus::SOLD;

        return $this;
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', ProductStatus::AVAILABLE);
    }
    public function scopeReserved($query)
    {
        return $query->where('status', ProductStatus::RESERVED);
    }
    public function scopeSold($query)
    {
        return $query->where('status', ProductStatus::SOLD);
    }
    public function scopeNotSold($query)
    {
        return $query->where('status', '<>', ProductStatus::SOLD);
    }
}