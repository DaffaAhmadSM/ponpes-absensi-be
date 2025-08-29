<?php

namespace App\Filament\Resources\UserAttendances\Pages;

use App\Filament\Resources\UserAttendances\UserAttendanceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserAttendances extends ListRecords
{
    protected static string $resource = UserAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
