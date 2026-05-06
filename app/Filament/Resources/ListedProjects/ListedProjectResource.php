<?php

namespace App\Filament\Resources\ListedProjects;

use App\Filament\Resources\ListedProjects\Pages\CreateListedProject;
use App\Filament\Resources\ListedProjects\Pages\EditListedProject;
use App\Filament\Resources\ListedProjects\Pages\ListListedProjects;
use App\Filament\Resources\ListedProjects\Schemas\ListedProjectForm;
use App\Filament\Resources\ListedProjects\Tables\ListedProjectsTable;
use App\Models\ListedProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ListedProjectResource extends Resource
{
    protected static ?string $model = ListedProject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Projects';

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Content';
    }

    public static function form(Schema $schema): Schema
    {
        return ListedProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ListedProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListListedProjects::route('/'),
            'create' => CreateListedProject::route('/create'),
            'edit' => EditListedProject::route('/{record}/edit'),
        ];
    }
}
