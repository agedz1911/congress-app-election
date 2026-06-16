<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\Pages\ManageSettings;
use App\Models\Setting;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog6Tooth;

    protected static ?string $recordTitleAttribute = 'Setting';

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Configuration';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('icon')
                    ->downloadable()
                    ->image()
                    ->directory('config')
                    ->imageEditor()
                    ->visibility('public')
                    ->disk('public'),
                MarkdownEditor::make('description')
                    ->columnSpanFull(),
                TextInput::make('venue'),
                TextInput::make('date'),
                FileUpload::make('logo')
                    ->label('Event Logo')
                    ->downloadable()
                    ->image()
                    ->directory('config')
                    ->columnSpanFull()
                    ->imageEditor()
                    ->imageEditorAspectRatioOptions([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->maxSize(1024 * 3)
                    ->panelLayout('grid')
                    ->visibility('public')
                    ->disk('public')
                    ->preserveFilenames(),
                FileUpload::make('logo2')
                    ->label('Logo Organization')
                    ->downloadable()
                    ->image()
                    ->directory('config')
                    ->columnSpanFull()
                    ->imageEditor()
                    ->maxSize(1024 * 3)
                    ->panelLayout('grid')
                    ->visibility('public')
                    ->disk('public')
                    ->preserveFilenames(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Setting')
            ->columns([
                ImageColumn::make('icon')
                    ->visibility('public')
                    ->disk('public'),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('venue')
                    ->searchable(),
                TextColumn::make('date')
                    ->searchable(),
                ImageColumn::make('logo')
                    ->disk('public')
                    ->searchable(),
                ImageColumn::make('logo2')
                    ->disk('public')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
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
            'index' => ManageSettings::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
