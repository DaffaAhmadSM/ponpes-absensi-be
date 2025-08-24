<?php

namespace App\Filament\Resources\MemberAttendances\Pages;

use App\Filament\Resources\MemberAttendances\MemberAttendanceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMemberAttendance extends EditRecord
{
    protected static string $resource = MemberAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
