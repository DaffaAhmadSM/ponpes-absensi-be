<?php

namespace App\Filament\Resources\UserAttendances\Pages;

use App\Filament\Resources\UserAttendances\UserAttendanceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUserAttendance extends ViewRecord
{
    protected static string $resource = UserAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // EditAction::make(),
        ];
    }
}
