<?php

namespace Te7aHoudini\Laroute\Tests;

use Te7aHoudini\Laroute\LarouteServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LarouteServiceProvider::class,
        ];
    }
}
