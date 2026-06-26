<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class Result extends Page
{
    protected string $view = 'filament.pages.result';

    protected static ?string $navigationLabel = 'Voting Results';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartPie;

    protected static string | UnitEnum | null $navigationGroup = 'Election';

    protected static ?int $navigationSort = 3;

    protected static ?string $title = 'Voting Results';

    protected static ?string $slug = 'voting-results';

    public function getHeading(): string
    {
        return 'Voting Results';
    }

    public function getTitle(): string
    {
        return 'Voting Results';
    }
}
