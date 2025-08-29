<?php

namespace App\Filament\Resources\UserAttendances\Pages;

use App\Filament\Resources\UserAttendances\UserAttendanceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUserAttendance extends CreateRecord
{
    protected static string $resource = UserAttendanceResource::class;
}
