<?php

namespace Yepsua\Filament;

use Filament\Facades\Filament;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentRangeFieldServiceProvider extends PackageServiceProvider
{
    /**
     * {@inheritDoc}
     *
     * @param Package $package
     * @return void
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-range-field')
            ->hasAssets()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        Filament::registerStyles([
            asset('vendor/filament-range-field/css/filament-forms-range-component.min.css'),
        ]);
    }
}
