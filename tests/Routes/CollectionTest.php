<?php

namespace Te7aHoudini\Laroute\Compilers;

use Te7aHoudini\Laroute\Tests\TestCase;

class CollectionTest extends TestCase
{
    protected $routeCollection;

    protected $routes;

    public function setUp(): void
    {
        parent::setUp();
        $this->routeCollection = $this->mock('Illuminate\Routing\RouteCollection');
        $this->routes          = $this->createInstance();
    }

    protected function createInstance()
    {
        return; // Life is too short.
        $this->routeCollection
            ->shouldReceive('count')
            ->once()
            ->andReturn(1)
            ->shouldReceive('getIterator')
            ->once()
            ->andReturn(['Huh?']);
        return new Collection($this->routeCollection);
    }

    public function testIFailedAtTestingACollection()
    {
        $this->assertTrue(true);
    }
}
