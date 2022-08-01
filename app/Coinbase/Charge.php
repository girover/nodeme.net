<?php

namespace App\Coinbase;

use Illuminate\Support\Arr;

class Charge
{
    /**
     * @var array The payload sent from coinbase website converted to array
     */
    public $payload;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Get payload properties
     * accepting nested keys
     * 
     * @param string $key
     * @return mix
     */
    public function get($key)
    {
        return Arr::get($this->payload, $key);
    }

    /**
     * Get the id of event
     * 
     * @return string
     */
    public function id()
    {
        return $this->get('event.id');
    }

    /**
     * Get the id of event
     * 
     * @return string
     */
    public function type()
    {
        return $this->get('event.type');
    }

    /**
     * Get the id of checkout of this charge
     * 
     * @return string
     */
    public function checkoutId()
    {
        return $this->get('event.data.checkout.id');
    }

    /**
     * Get the metadata of this charge
     * 
     * @return array
     */
    public function metadata()
    {
        return $this->get('event.data.metadata');
    }
}