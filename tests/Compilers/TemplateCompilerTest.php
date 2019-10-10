<?php

namespace Te7aHoudini\Laroute\Compilers;

use Te7aHoudini\Laroute\Tests\TestCase;

class TemplateCompilerTest extends TestCase
{
    protected $compiler;

    public function setUp(): void
    {
        parent::setUp();

        $this->compiler = new TemplateCompiler();
    }

    public function testItIsOfTheCorrectInterface()
    {
        $this->assertInstanceOf(
            'Te7aHoudini\Laroute\Compilers\CompilerInterface',
            $this->compiler
        );
    }

    public function testItCanCompileAString()
    {
        $template = 'Hello $YOU$, my name is $ME$.';
        $data     = ['you' => 'Stranger', 'me' => 'Aaron'];
        $expected = "Hello Stranger, my name is Aaron.";

        $this->assertSame($expected, $this->compiler->compile($template, $data));
    }
}
