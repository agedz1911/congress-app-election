<?php

namespace App\Filament\Resources\Participants;

use App\Filament\Resources\Participants\Pages\ManageParticipants;
use App\Models\Participant;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ParticipantResource extends Resource
{
    protected static ?string $model = Participant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserPlus;

    protected static ?string $recordTitleAttribute = 'Participant';

    protected static string | UnitEnum | null $navigationGroup = 'Election';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('participant_number')
                    ->default(fn () => static::generateParticipantNumber())
                    ->readOnly()
                    ->required(),
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('title_specialization'),
                Select::make('type')
                    ->options([
                        'Specialist' => 'Specialist',
                        'Resident' => 'Resident',
                        'General Practitioner' => 'General Practitioner',
                        'Medical Student' => 'Medical Student',
                    ]),
                TextInput::make('member_id')
                    ->label('Member ID'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone_number')
                    ->tel(),
                TextInput::make('institution'),
                Select::make('country')
                    ->options(collect(countries())->mapWithKeys(function ($country) {
                        // Menggunakan ISO Alpha-2 (misal: 'ID') sebagai key, dan nama umum sebagai value
                        return [$country['iso_3166_1_alpha2'] => $country['name']];
                    })->toArray())
                    ->searchable()
                    ->preload(),
                Select::make('participant_category')
                    ->options([
                        'Speaker' => 'Speaker',
                        'Moderator' => 'Moderator',
                        'Committee' => 'Committee',
                        'Participant' => 'Participant',
                    ])
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('full_name'),
                TextEntry::make('title_specialization')
                    ->placeholder('-'),
                TextEntry::make('type')
                    ->placeholder('-'),
                TextEntry::make('member_id')
                    ->placeholder('-'),
                TextEntry::make('participant_number')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('phone_number')
                    ->placeholder('-'),
                TextEntry::make('institution')
                    ->placeholder('-'),
                TextEntry::make('country')
                    ->formatStateUsing(function ($state) {
                        $country = collect(countries())->firstWhere('iso_3166_1_alpha2', $state);
                        return $country ? $country['name'] : $state;
                    })
                    ->placeholder('-'),
                TextEntry::make('participant_category')
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn(Participant $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Participant')
            ->columns([
                TextColumn::make('participant_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('title_specialization')
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
                TextColumn::make('member_id')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->searchable(),
                TextColumn::make('institution')
                    ->searchable(),
                TextColumn::make('country')
                    ->formatStateUsing(function ($state) {
                        $country = collect(countries())->firstWhere('iso_3166_1_alpha2', $state);
                        return $country ? $country['name'] : $state;
                    })
                    ->searchable(),
                TextColumn::make('participant_category')
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageParticipants::route('/'),
        ];
    }

    protected static function generateParticipantNumber(): string
    {
        $maxParticipantNumber = Participant::withTrashed()
            ->whereNotNull('participant_number')
            ->pluck('participant_number')
            ->map(function (string $participantNumber): int {
                if (preg_match('/^R-(\d+)$/', $participantNumber, $matches) === 1) {
                    return (int) $matches[1];
                }

                return 0;
            })
            ->max();

        $nextNumber = ((int) $maxParticipantNumber) + 1;

        return 'R-' . str_pad((string) $nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
