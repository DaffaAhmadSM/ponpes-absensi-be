<?php

namespace App\Filament\Resources\MemberAttendances\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MemberAttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('instance_location_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('attendance_date')
                    ->required(),
                DateTimePicker::make('check_in_time')
                    ->required(),
                DateTimePicker::make('check_out_time'),
                TextInput::make('check_in_latitude')
                    ->required()
                    ->numeric(),
                TextInput::make('check_in_longitude')
                    ->required()
                    ->numeric(),
                TextInput::make('check_out_latitude')
                    ->numeric()
                    ->default(null),
                TextInput::make('check_out_longitude')
                    ->numeric()
                    ->default(null),
                TextInput::make('check_in_status')
                    ->required()
                    ->default('present'),
                TextInput::make('check_out_status')
                    ->default(null),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
