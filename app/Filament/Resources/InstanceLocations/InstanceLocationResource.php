<?php

namespace App\Filament\Resources\InstanceLocations;

use App\Filament\Resources\InstanceLocations\Pages\CreateInstanceLocation;
use App\Filament\Resources\InstanceLocations\Pages\EditInstanceLocation;
use App\Filament\Resources\InstanceLocations\Pages\ListInstanceLocations;
use App\Filament\Resources\InstanceLocations\Schemas\InstanceLocationForm;
use App\Filament\Resources\InstanceLocations\Tables\InstanceLocationsTable;
use App\Models\InstanceLocation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class InstanceLocationResource extends Resource
{
    protected static ?string $model = InstanceLocation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::MapPin;
    
    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static ?string $recordTitleAttribute = 'Instance';

    public static function form(Schema $schema): Schema
    {
        return InstanceLocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstanceLocationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInstanceLocations::route('/'),
            'create' => CreateInstanceLocation::route('/create'),
            'edit' => EditInstanceLocation::route('/{record}/edit'),
        ];
    }
}
