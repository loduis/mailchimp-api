<?php

namespace Mailchimp;

use Illuminate\Api\Http\Restable;
use Illuminate\Api\Http\Resource as ApiResource;

/**
 * Base resource
 */
abstract class Resource extends ApiResource
{
    public static $snakeAttributes = true;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = [
        'id' => 'string'
    ];

    use Restable;

    public static function first()
    {
        return static::all(['count' => 1])->first();
    }
}
