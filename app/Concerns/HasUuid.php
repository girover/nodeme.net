<?php
/**
 * ----------------------------------
 * The model that has uuid column
 * ----------------------------------
 * This will generate a new uuid when creating
 * a new model
 */
namespace App\Concerns;

use Illuminate\Support\Str;

trait HasUuid {

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

    public function regenerateUuid()
    {
        $this->uuid = Str::uuid()->toString();
        $this->save();
    }
}