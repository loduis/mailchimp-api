<?php

namespace Mailchimp;

final class Campaign extends Resource
{
    protected static function filterWith()
    {
        static $filter;

        return $filter ?: $filter = (new Support\Filter)
            ->fillable('type', 'array')
            ->fillable('status', 'array');
    }
}
