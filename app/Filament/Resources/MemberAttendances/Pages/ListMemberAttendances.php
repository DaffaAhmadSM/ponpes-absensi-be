<?php

namespace App\Filament\Resources\MemberAttendances\Pages;

use App\Filament\Resources\MemberAttendances\MemberAttendanceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMemberAttendances extends ListRecords
{
    protected static string $resource = MemberAttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            CreateAction::make(),
        ];
    }
}
