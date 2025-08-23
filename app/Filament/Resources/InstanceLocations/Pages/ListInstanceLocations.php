<?php

namespace App\Filament\Resources\InstanceLocations\Pages;

use App\Filament\Resources\InstanceLocations\InstanceLocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInstanceLocations extends ListRecords
{
    protected static string $resource = InstanceLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
