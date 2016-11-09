<?php

namespace Mailchimp\Support;

use Illuminate\Api\Resource\Filter as ResourceFilter;

/**
 * Filter alegra request
 *
 * @method $this offset(int $value)
 * @method $this count(int $value)
 */
class Filter extends ResourceFilter
{
    public static $snakeAttributes = true;

    protected $fillable = [
        'fields'          => 'array',
        'offset'          => 'int',
        'count'           => 'int',
        'exclude_fields'  => 'array'
    ];
}
