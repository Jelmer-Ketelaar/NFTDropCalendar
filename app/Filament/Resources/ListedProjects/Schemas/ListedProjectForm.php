<?php

namespace App\Filament\Resources\ListedProjects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ListedProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(25),
                Textarea::make('description')->required()->maxLength(750)->columnSpanFull(),
                \Filament\Forms\Components\Select::make('blockchain')
                    ->options(['ethereum' => 'Ethereum', 'solana' => 'Solana', 'polygon' => 'Polygon', 'cardano' => 'Cardano', 'avalanche' => 'Avalanche'])
                    ->required(),
                \Filament\Forms\Components\Select::make('category')
                    ->options(['Fun' => 'Fun', 'Metaverse' => 'Metaverse', 'Artwork' => 'Artwork'])
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('thumbnail')->image()->directory('images')->columnSpanFull(),
                TextInput::make('floorPrice')->numeric()->step(0.00001),
                TextInput::make('volume')->numeric()->step(0.0001),
                TextInput::make('traits')->numeric(),
                TextInput::make('royality')->numeric()->required(),
                TextInput::make('supply')->numeric()->required(),
                TextInput::make('teamAmount')->numeric()->required(),
                TextInput::make('twitterName'),
                TextInput::make('discordLink'),
                TextInput::make('websiteLink'),
                TextInput::make('marketplaceLink'),
                TextInput::make('emailContact')->email()->maxLength(70),
                Textarea::make('roadmap')->maxLength(2000)->columnSpanFull(),
                TextInput::make('twitterFollowerNumber')->numeric()->default(0),
                TextInput::make('discordMemberNumber')->numeric()->default(0),
                \Filament\Forms\Components\Select::make('promoted')
                    ->options(['promote' => 'Promote (paid)', 'promote1' => 'Promote1', 'promote2' => 'Promote2', 'promote3' => 'Promote3'])
                    ->default('promote2')
                    ->required(),
                \Filament\Forms\Components\Select::make('verified')
                    ->options(['true' => 'Verified', 'false' => 'Pending'])
                    ->default('false')
                    ->required(),
                TextInput::make('updateStatus'),
                DateTimePicker::make('dateUploadDropUser'),
            ]);
    }
}
