<?php

namespace App\Filament\Resources\MemberAttendances\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MemberAttendanceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('instance_location_id')
                    ->numeric(),
                TextEntry::make('attendance_date')
                    ->date(),
                TextEntry::make('check_in_time')
                    ->dateTime(),
                TextEntry::make('check_out_time')
                    ->dateTime(),
                TextEntry::make('check_in_latitude')
                    ->numeric(),
                TextEntry::make('check_in_longitude')
                    ->numeric(),
                TextEntry::make('check_out_latitude')
                    ->numeric(),
                TextEntry::make('check_out_longitude')
                    ->numeric(),
                TextEntry::make('check_in_status'),
                TextEntry::make('check_out_status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
