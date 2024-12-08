<?php

namespace App\Filament\Resources\DashboardStatsOverviewResource\Widgets;

use App\Models\BahanBaku;
use App\Models\Produk;
use App\Models\Produksi;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total  Bahan Baku', BahanBaku::count())
                ->icon('heroicon-o-squares-plus')
                ->color('primary'),

            Stat::make('Total Produk', Produk::count())
                ->icon('heroicon-o-shopping-bag')
                ->color('success'),

            Stat::make('Total Produksi', Produksi::count())
                ->icon('heroicon-o-beaker')
                ->color('danger'),

            Stat::make('Total Supplier', Supplier::count())
                ->icon('heroicon-o-truck')
                ->color('danger'),

            // Stat::make('Total Produk', Produk::count())
            // ->description('32k increase')
            // ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->chart([7, 2, 10, 3, 15, 4, 17])
            // ->color('success'),

        ];
    }
}
