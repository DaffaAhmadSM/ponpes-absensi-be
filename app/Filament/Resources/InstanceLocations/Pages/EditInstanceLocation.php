<?php

namespace App\Filament\Resources\InstanceLocations\Pages;

use App\Filament\Resources\InstanceLocations\InstanceLocationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInstanceLocation extends EditRecord
{
    protected static string $resource = InstanceLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
