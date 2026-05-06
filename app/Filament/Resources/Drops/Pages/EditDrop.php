<?php

namespace App\Filament\Resources\Drops\Pages;

use App\Filament\Resources\Drops\DropResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDrop extends EditRecord
{
    protected static string $resource = DropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
