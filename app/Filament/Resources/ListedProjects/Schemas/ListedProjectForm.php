<?php
namespace App\Filament\Resources\ListedProjects\Schemas;

use App\Enums\Blockchain;
use App\Enums\Category;
use App\Enums\PromotionLevel;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ListedProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(25),
                Textarea::make('description')->required()->maxLength(750)->columnSpanFull(),
                Select::make('blockchain')->options(Blockchain::options())->required(),
                Select::make('category')->options(Category::options())->required(),
                FileUpload::make('thumbnail')->image()->directory('images')->columnSpanFull(),
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
                Select::make('promoted')->options(PromotionLevel::options())->default(PromotionLevel::Promote2->value)->required(),
                Toggle::make('verified')->default(false),
                DateTimePicker::make('dateUploadDropUser'),
            ]);
    }
}
