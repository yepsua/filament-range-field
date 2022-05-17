<?php

namespace Yepsua\Filament\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Yepsua\Filament\FilamentRangeFieldServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            FilamentRangeFieldServiceProvider::class,
        ];
    }
}
