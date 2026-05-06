<?php

namespace App\Filament\Resources\ListedProjects\Pages;

use App\Filament\Resources\ListedProjects\ListedProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListListedProjects extends ListRecords
{
    protected static string $resource = ListedProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
