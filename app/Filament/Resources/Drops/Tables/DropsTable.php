<?php
namespace App\Filament\Resources\Drops\Tables;

use App\Enums\Blockchain;
use App\Enums\PromotionLevel;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class DropsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->circular()->size(48),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('blockchain')->badge()->sortable(),
                TextColumn::make('category')->badge(),
                TextColumn::make('dropDate')->dateTime()->sortable(),
                TextColumn::make('mintPrice')->sortable(),
                TextColumn::make('twitterFollowerNumber')->label('Twitter #')->numeric()->sortable(),
                TextColumn::make('discordMemberNumber')->label('Discord #')->numeric()->sortable(),
                TextColumn::make('promoted')->badge()
                    ->color(fn (string $state) => match ($state) {
                        PromotionLevel::Promote->value  => 'success',
                        default => 'warning',
                    }),
                IconColumn::make('verified')->boolean(),
            ])
            ->filters([
                TernaryFilter::make('verified'),
                SelectFilter::make('blockchain')->options(Blockchain::options()),
                SelectFilter::make('promoted')->options(PromotionLevel::options()),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->hidden(fn ($record) => $record->verified === true)
                    ->action(fn ($record) => $record->update(['verified' => true])),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
