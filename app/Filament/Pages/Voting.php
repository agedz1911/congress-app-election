<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class Voting extends Page
{
    protected string $view = 'filament.pages.voting';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;

    protected static ?string $navigationLabel = 'Votings';

    protected static string | UnitEnum | null $navigationGroup = 'Election';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Votings';

    protected static ?string $slug = 'votings';

    public function getTitle(): string
    {
        return 'Votings';
    }

    public function getHeading(): string
    {
        return 'Votings';
    }

    public function getSubheading(): ?string
    {
        return 'Kelola voting untuk pemilihan';
    }
}
