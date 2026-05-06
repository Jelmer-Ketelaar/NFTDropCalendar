<?php

namespace App\Filament\Resources\Drops\Pages;

use App\Filament\Resources\Drops\DropResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDrops extends ListRecords
{
    protected static string $resource = DropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
