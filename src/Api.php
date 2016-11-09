<?php

namespace Mailchimp;

use Illuminate\Api\Http\Api as HttpApi;

class Api
{
    /**
     * The current version of package
     *
     * @var int
     */
    const VERSION  = '3.0';

    /**
     * The current version of php bindings
     *
     * @var  string
     */
    const BINDING_VERSION = '0.0.4';

    /**
     * Custom options of http client
     *
     * @var array
     */
    private static $clientOptions = [];

    /**
     * The base path of api
     *
     * @var string
     */
    const BASE_URI = 'https://usX.api.mailchimp.com';

    /**
     * The base path of schema uri
     */
    const SCHEMA_URI = 'https://api.mailchimp.com/schema/';

    public static function auth(...$auth)
    {
        HttpApi::auth(...$auth);
        $baseUri = static::getBaseUri($auth);
        HttpApi::baseUri($baseUri);
        $options = static::$clientOptions;
        $options['headers']['User-Agent'] = 'Mailchimp/' . static::VERSION .
                                            ' PhpBindings/' . static::BINDING_VERSION;
        HttpApi::createClient($options);
    }

    /**
     * Set the custom options for create http client
     *
     * @param  array  $options
     * @return void
     */
    public static function clientOptions(array $options)
    {
        static::$clientOptions = $options;
    }

    protected static function getBaseUri($auth)
    {
        list(, $apiKey) = $auth;
        $parts = explode('-', $apiKey);
        list($key, $region) = $parts;

        return str_replace('usX', $region, static::BASE_URI) . '/' . static::VERSION . '/';
    }
}
