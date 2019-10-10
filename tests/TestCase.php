<?php

namespace Te7aHoudini\Laroute\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Te7aHoudini\Laroute\LarouteServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LarouteServiceProvider::class,
        ];
    }
}