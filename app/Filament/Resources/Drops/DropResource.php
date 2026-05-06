<?php

namespace App\Filament\Resources\Drops;

use App\Filament\Resources\Drops\Pages\CreateDrop;
use App\Filament\Resources\Drops\Pages\EditDrop;
use App\Filament\Resources\Drops\Pages\ListDrops;
use App\Filament\Resources\Drops\Schemas\DropForm;
use App\Filament\Resources\Drops\Tables\DropsTable;
use App\Models\Drop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DropResource extends Resource
{
    protected static ?string $model = Drop::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static ?string $navigationLabel = 'Drops';

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Content';
    }

    public static function form(Schema $schema): Schema
    {
        return DropForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DropsTable::configure($table);
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
            'index' => ListDrops::route('/'),
            'create' => CreateDrop::route('/create'),
            'edit' => EditDrop::route('/{record}/edit'),
        ];
    }
}
