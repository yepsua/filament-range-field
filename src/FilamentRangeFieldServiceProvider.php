<?php

namespace Yepsua\Filament;

use Filament\Facades\Filament;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
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
        FilamentAsset::register([
            Css::make('custom-stylesheet', __DIR__ . '/../resources/dist/css/filament-forms-range-component.min.css'),
        ]);
    }
}
