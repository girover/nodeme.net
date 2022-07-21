<?php

namespace App\Enums;

class ProductStatus extends Enum {

    /**
     * Product is available for sale
     */
    const AVAILABLE = 'a';
    /**
     * Product is reserved for a specific user
     */
    const RESERVED  = 'r';
    /**
     * Product is sold and not available for sale
     */
    const SOLD      = 's';

}