<?php

namespace App\Filament\Resources\Drops\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DropForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(25),
                Textarea::make('description')->required()->maxLength(750)->columnSpanFull(),
                Select::make('blockchain')
                    ->options(['ethereum' => 'Ethereum', 'solana' => 'Solana', 'polygon' => 'Polygon', 'cardano' => 'Cardano', 'avalanche' => 'Avalanche'])
                    ->required(),
                Select::make('category')
                    ->options(['Fun' => 'Fun', 'Metaverse' => 'Metaverse', 'Artwork' => 'Artwork'])
                    ->required(),
                FileUpload::make('thumbnail')->image()->directory('images')->columnSpanFull(),
                DateTimePicker::make('dropDate'),
                TextInput::make('mintPrice')->numeric()->step(0.0001),
                TextInput::make('royality')->numeric()->required(),
                TextInput::make('supply')->numeric()->required(),
                TextInput::make('teamAmount')->numeric()->required(),
                TextInput::make('twitterName'),
                TextInput::make('discordLink'),
                TextInput::make('websiteLink'),
                TextInput::make('emailContact')->email()->maxLength(70),
                Textarea::make('roadmap')->maxLength(2000)->columnSpanFull(),
                TextInput::make('twitterFollowerNumber')->numeric()->default(0),
                TextInput::make('discordMemberNumber')->numeric()->default(0),
                Select::make('promoted')
                    ->options(['promote' => 'Promote (paid)', 'promote1' => 'Promote1', 'promote2' => 'Promote2', 'promote3' => 'Promote3'])
                    ->default('promote2')
                    ->required(),
                Select::make('verified')
                    ->options(['true' => 'Verified', 'false' => 'Pending'])
                    ->default('false')
                    ->required(),
                TextInput::make('updateStatus'),
            ]);
    }
}
