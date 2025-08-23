<?php

namespace App\Filament\Resources\InstanceLocations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InstanceLocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('longitude')
                    ->required()
                    ->numeric(),
                TextInput::make('latitude')
                    ->required()
                    ->numeric(),
                Toggle::make('default')
                    ->required(),
                TextInput::make('address')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
