<?php

namespace App\Enums;

use Illuminate\Support\Str;
use ReflectionClass;

class Enum {

    /**
     * @var array All role names
     */
    protected static $constants;

    /**
     * Get the enum-case-name in lower case
     * 
     * @param string $value the value of the role
     * @return string|null
     */
    public static function name($value)
    {
        foreach (static::getConstants() as $key => $constant_value) {
            if ($value == $constant_value) {
                return Str::lower($key);
            }
        }
        return null;
    }

    /**
     * Get all constants as array
     * 
     * @return array
     */
    public static function getConstants()
    {
        if (! static::$constants) {
            $r = new ReflectionClass(static::class);
            static::$constants = $r->getConstants();
        }

        return static::$constants;
    }
}