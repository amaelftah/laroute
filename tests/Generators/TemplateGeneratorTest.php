<?php

namespace Te7aHoudini\Laroute\Generators;

use Te7aHoudini\Laroute\Tests\TestCase;

class TemplateGeneratorTest extends TestCase
{
    protected $compiler;

    protected $filesystem;

    protected $generator;

    public function setUp(): void
    {
        parent::setUp();

        $this->compiler = $this->mock('Te7aHoudini\Laroute\Compilers\CompilerInterface');
        $this->filesystem = $this->mock('Illuminate\Filesystem\Filesystem');

        $this->generator = new TemplateGenerator($this->compiler, $this->filesystem);
    }

    public function testItIsOfTheCorrectInterface()
    {
        $this->assertInstanceOf(
            'Te7aHoudini\Laroute\Generators\GeneratorInterface',
            $this->generator
        );
    }

    public function testItWillCompileAndSaveATemplate()
    {
        $template = 'Template';
        $templatePath = '/templatePath';
        $templateData = ['foo', 'bar'];
        $filePath = '/filePath';

        $this->filesystem
            ->shouldReceive('get')
            ->once()
            ->with($templatePath)
            ->andReturn($template);

        $this->filesystem
            ->shouldReceive('isDirectory')
            ->once()
            ->andReturn(true);

        $this->compiler
            ->shouldReceive('compile')
            ->once()
            ->with($template, $templateData)
            ->andReturn($template);

        $this->filesystem
            ->shouldReceive('put')
            ->once()
            ->with($filePath, $template);

        $actual = $this->generator->compile($templatePath, $templateData, $filePath);
        $this->assertSame($actual, $filePath);
    }
}
