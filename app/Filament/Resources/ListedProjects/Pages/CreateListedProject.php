<?php

namespace App\Filament\Resources\ListedProjects\Pages;

use App\Filament\Resources\ListedProjects\ListedProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateListedProject extends CreateRecord
{
    protected static string $resource = ListedProjectResource::class;
}
