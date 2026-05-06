<?php

namespace App\Filament\Resources\ListedProjects\Pages;

use App\Filament\Resources\ListedProjects\ListedProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditListedProject extends EditRecord
{
    protected static string $resource = ListedProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
