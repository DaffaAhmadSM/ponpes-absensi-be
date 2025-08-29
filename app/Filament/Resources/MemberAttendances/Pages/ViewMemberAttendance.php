<?php

namespace App\Filament\Resources\MemberAttendances\Pages;

use App\Filament\Resources\MemberAttendances\MemberAttendanceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMemberAttendance extends ViewRecord
{
    protected static string $resource = MemberAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // EditAction::make(),
        ];
    }
}
