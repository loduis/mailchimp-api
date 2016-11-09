<?php

namespace Mailchimp\Tests;

use Mailchimp\Api;
use Illuminate\Api\Testing\ApiHandler;
use Illuminate\Api\Testing\TestCase as ApiTestCase;

/**
 * Base class for Alegra test cases, provides some utility methods for creating
 * objects.
 */
abstract class TestCase extends ApiTestCase
{
    protected function setUp()
    {
        $apiUser = getenv('API_USER');
        $apiKey = getenv('API_KEY');
        Api::auth($apiUser, $apiKey);
    }
}
