<?php

namespace App\Filament\Resources\AppSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AppSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->disabledOn('edit'),
                Textarea::make('value')
                    ->required()
                    ->default(null),
                TextInput::make('type')
                    ->required()
                    ->datalist([
                        "string",
                        "integer",
                        "boolean",
                        "decimal"
                    ])
                    ->default('string'),
                TextInput::make('description')
                    ->default(null),
            ]);
    }
}
