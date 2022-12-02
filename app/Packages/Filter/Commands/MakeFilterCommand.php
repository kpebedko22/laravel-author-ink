<?php

namespace App\Packages\Filter\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeFilterCommand extends GeneratorCommand
{
    protected $signature = 'make:filter {name}';

    protected $description = 'Create a new filter class';

    protected $type = 'Filter';

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/eloquent_filter.stub');
    }

    protected function resolveStubPath(string $stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\Filters";
    }
}
